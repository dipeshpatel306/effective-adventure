import glob
import os
import shutil
import sys
import tempfile
import zipfile


def replace_with_suffixed_versions(path, filenames, suffix) :
    for filename in filenames :
        filepath = os.path.join(path, filename)
        os.remove(filepath)
        suffix_file = '.'.join((filepath, suffix))
        shutil.copyfile(suffix_file, filepath)
        for fpath in glob.glob(filepath + '.*') :
            os.remove(fpath)

def package(brand, env, version) :
    tmp_path = tempfile.mkdtemp()
    dirnames = ('core', 'webroot', brand)
    for dirname in dirnames :
        dirpath = os.path.join(os.path.dirname(os.path.realpath(__file__)), dirname)
        if not os.path.exists(dirpath) :
            print ('error: could not find direcotry {}'.format(dirpath))
            os._exit(1)
        shutil.copytree(
            dirpath, os.path.join(tmp_path, dirname),
            ignore=shutil.ignore_patterns('*.git')
        )

    webroot_dir = os.path.join(tmp_path, 'webroot')
    replace_with_suffixed_versions(webroot_dir, ('favicon.ico', 'index.php'), brand)

    config_dir = os.path.join(tmp_path, brand, 'app', 'Config')
    replace_with_suffixed_versions(config_dir, ('core.php', 'database.php'), env)

    shutil.rmtree(os.path.join(tmp_path, brand, 'app', 'webroot', 'files'), ignore_errors=True)

    zip_name = '{b}_{e}_{v}.zip'.format(b=brand, e=env, v=version)
    zip_path = os.path.join('build', zip_name)
    with zipfile.ZipFile(zip_path, mode='w', compression=zipfile.ZIP_DEFLATED) as zipf :
        for dirname in dirnames :
            for root, dirs, files in os.walk(os.path.join(tmp_path, dirname)) :
                relative_root = root.replace(tmp_path + os.sep, '')
                for f in files :
                    zipf.write(os.path.join(root, f), arcname=os.path.join(relative_root, f))

    shutil.rmtree(tmp_path, ignore_errors=True)

    print('Done')


if __name__ == "__main__" :
    brand = sys.argv[1]
    env = sys.argv[2]
    version = sys.argv[3]
    print('Packaging {} {} {}'.format(brand, env, version))
    package(brand.lower(), env.lower(), version)
