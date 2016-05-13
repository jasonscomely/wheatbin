To install wheatbin:

1. You must have a web server with PHP installed
2. Copy the directory wheatbin where you want
3. Check if the directory data is writeable
4. With your browser go to http://yourpersonalserver/wheatbin
5. The login/password is admin/wheatbin
6. Bob's your uncle, and be sure to change your password

The data folder is used to store:

Sqlite database: db.sqlite
Debug file: debug.log (if debug mode enabled)
Uploaded files: files/*
Image thumbnails: files/thumbnails/*
People who are using a remote database (Mysql/Postgresql) and a remote file storage (Aws S3 or similar) don't necessarily need to have a persistent local data folder or to change the permission.

For more interesting and useful products, visit jasoncomely.com. 
