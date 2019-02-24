update:
	git --git-dir=wp-mailgun/.git --work-tree=wp-mailgun pull
	git --git-dir=wp-stateless/.git --work-tree=wp-stateless pull

bootstrap:
	git submodule add -b master https://github.com/mailgun/wordpress-plugin.git wp-mailgun
	git submodule add -b latest https://github.com/wpCloud/wp-stateless.git wp-stateless