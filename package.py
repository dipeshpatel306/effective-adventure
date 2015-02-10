import glob
import os
import shutil
import sys
import tempfile
import zipfile


def package(env, version) :
	app_path = os.path.join(os.path.dirname(os.path.realpath(__file__)), 'app')
	if not os.path.exists(app_path) :
		print('error: Could not find app directory {}'.format(app_path))
		os._exit(1)
		
	tmp_path = tempfile.mkdtemp()
	shutil.copytree(
		app_path, os.path.join(tmp_path, 'app'),
		ignore=shutil.ignore_patterns('*.git')
	)
	
	config_dir = os.path.join(tmp_path, 'app', 'Config')
	for filename in ('core.php', 'database.php') :
		filepath = os.path.join(config_dir, filename)
		os.remove(filepath)
		env_file = '.'.join((filepath, env.lower()))
		shutil.copyfile(env_file, filepath)
		for fpath in glob.glob(filepath + '.*') :
			os.remove(fpath)
		
	shutil.rmtree(os.path.join(tmp_path, 'app', 'webroot', 'files'))
	
	zip_name = 'hipaa_{e}_{v}.zip'.format(e=env.lower(), v=version)
	with zipfile.ZipFile(zip_name, mode='w', compression=zipfile.ZIP_DEFLATED) as zipf :
		for root, dirs, files in os.walk(os.path.join(tmp_path, 'app')) :
			relative_root = root.replace(tmp_path + os.sep, '')
			for f in files :
				zipf.write(os.path.join(root, f), arcname=os.path.join(relative_root, f))

	shutil.rmtree(tmp_path, ignore_errors=True)
	
	print('Done')
	
	
if __name__ == "__main__" :
	env = sys.argv[1]
	version = sys.argv[2]
	print('Packaging {} {}'.format(env, version))
	package(env, version)