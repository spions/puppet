Puppet: PHP class for remote control
======

Since the Internet ready solution for remote control puppet server, in particular the signing and deleting certificates, I have not found - sketched your php class.

Full API is available on the link Puppet API (http://docs.puppetlabs.com/guides/rest_api.html)

In order to control possible, you need to edit auth.conf on puppet server:

--------------------------------------------------------------------------

path  /certificate_statuses

auth any

method find, search, save, destroy

allow localhost, puppet_remote_management

path  /certificate_status

auth any

method find, search, save, destroy

allow localhost, puppet_remote_management

--------------------------------------------------------------------------
