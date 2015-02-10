import ntsecuritycon as con
import os
import shutil
import sys
import win32security
import wmi
import zipfile

def get_iis() :
	c = wmi.WMI()	
	return c.Win32_Service(Name="W3SVC")[0]

def stop_iis() :
	print('Stopping IIS...')
	#get_iis().StopService()
	
def start_iis() :
	print('Starting IIS...')
	#get_iis().StartService()
	
def get_iis_users() :
	user_IUSR, _, _ = win32security.LookupAccountName('', 'IUSR')
	user_IIS, _, _  = win32security.LookupAccountName('', 'IIS_IUSRS')
	return [ user_IUSR, user_IIS ]
	
def set_iis_write_permissions(dirname) :
	sd = win32security.GetFileSecurity(dirname, win32security.DACL_SECURITY_INFORMATION)
	dacl = sd.GetSecurityDescriptorDacl()
	
	perm = con.FILE_GENERIC_WRITE | con.FILE_GENERIC_READ | con.FILE_GENERIC_EXECUTE
	for user in get_iis_users() :
		dacl.AddAccessAllowedAce(win32security.ACL_REVISION, perm, user)
		
	sd.SetSecurityDescriptorDacl(1, dacl, 0)
	win32security.SetFileSecurity(dirname, win32security.DACL_SECURITY_INFORMATION, sd)
	
def deploy(zip_path, app_dir) :
	bak_path = os.path.join(app_dir, 'app.bak')
	print('Removing previous backup ({})...'.format(bak_path))
	shutil.rmtree(bak_path)
	
	print('Backing up current app...')
	shutil.move(os.path.join(app_dir, 'app'), os.path.join(app_dir, 'app.bak'))
	
	print('Extracting {}'.format(zip_path))
	with zipfile.ZipFile(zip_path, 'r', compression=zipfile.ZIP_DEFLATED) as zipf :
		zipf.extractall(app_dir)
	
	# take uploaded files from previous version backup
	print('Restoring files...')
	files_dir = os.path.join(app_dir, 'app', 'webroot', 'files')
	shutil.rmtree(files_dir, ignore_errors=True)
	shutil.copytree(os.path.join(app_dir, 'app.bak', 'webroot', 'files'), files_dir)
	
	# set write permission on tmp and files directories
	print('Setting permissions...')
	set_iis_write_permissions(os.path.join(app_dir, 'app', 'tmp'))
	set_iis_write_permissions(os.path.join(app_dir, 'app', 'webroot', 'files'))
	
	# TODO : auomated SQL deployment?
	
	
if __name__ == "__main__" :
	stop_iis()
	try :
		deploy(sys.argv[1], sys.argv[2])
	finally :
		start_iis()
	
	print('Done!')
