asciidoc-webpage
================

This is supposed to be a simple, 'wiki-like' scheme for a community to work on a common proposal/suggestion/etc. with discussion based on mailinglists (for long-term archival). Updates to the actual content are discussed based on patches.

Prerequisites:
--------------

1. Webserver with PHP installation and emailer (mail() in PHP should work)
2. AsciiDoc installed (e.g. via `apt-get install asciidoc`)

Setup:
--------------

1. Upload contents to your webfolder
2. Change permissions to the user under which your web server process is run (www-data on Debian-based systems)

    chown -R www-data:www-data 

3. Upload you initial webpage draft in index.txt
4. Browse to http://your-server/your-folder/edit.php in your browser and click on 'submit changes'

