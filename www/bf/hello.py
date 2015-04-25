import tinys3
from boto.s3.connection import S3Connection
import ConfigParser
import uuid
from mod_python import util

cp = ConfigParser.ConfigParser()
cp.readfp(open('/mnt/var/s3.cfg'))

awsAccessKey = cp.get('aws', 'awsAccessKey')
awsSecretKey = cp.get('aws', 'awsSecretKey')
bucketName = cp.get('aws', 'bucketName')

conn = S3Connection(awsAccessKey, awsSecretKey)
bucket = conn.get_bucket(bucketName)

def index():
	page = """
		<html><body>
		<form action="post_img" method='post' enctype="multipart/form-data">
		Upload image file here
		<input type='file' name='file'/> <input type='submit' value='Upload Image'/>
		</form>
		</body></html>
	"""
	return page

def post_img(req):
	frm = util.FieldStorage(req)
	if frm.has_key('email'):
		email = frm.getfirst('email')
	else:
		email = ''
	if frm.has_key('prob'):
		prob = frm.getfirst('prob')
	else:
		prob = ''
	if frm.has_key('code'):
		code = frm.getfirst('code')
	else:
		code = ''
	row = email + '\t' + prob + '\t' + code + '\n'
	f = open('/mnt/data/responses.csv', 'a')
	f.write(row)
	f.close()
	tempFile = req.form['file']
	id = str(uuid.uuid4())
	key = bucket.new_key(id + '.jpg')
	data = tempFile.file.read()
	key.set_contents_from_string(data)
	return 'success'
