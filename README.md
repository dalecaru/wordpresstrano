# WordPresstano

Automated Wordpress deployment with Capistrano

## Installation

```bash
git clone https://raw.github.com/DamianCaruso/wordpresstano
cd wordpresstano
bundle install
```
## Configuration

You need a private Git repository containing this project.

Next, update `config/deploy.rb` and `config/deploy/<environment.rb>` accordingly.

## Environment Setup

Create the following structure under the `<deploy_to>` directory in each environment.

````bash
.
+-- shared
|   +--config
|   |   +-- database.php
|   |   +-- secrets.php
````

You can use the sample files as templates.

* [database.php](https://github.com/DamianCaruso/wordpresstrano/tree/master/config/database-sample.php)
* [secrets.php](https://github.com/DamianCaruso/wordpresstrano/tree/master/config/secrets-sample.php)

Install [Composer](https://getcomposer.org/).

```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`
```

Apache/Nginx and mod_php/php-fpm setup are out of scope and will not be dealt in this document.

## Deployment

```bash
bundle exec cap production deploy
```

## Installing WordPress

Visit `http://<yourwordpressdomain>/wp/wp-admin/` and follow the instructions in the installation wizard.

## Upgrading WordPress

[Composer](https://getcomposer.org/) is used as dependency manager. [Wpackagist](http://wpackagist.org) as repository for wordpress themes and plugins.

1. Edit `composer.json` to upgrade or install plugins, themes or the wordpress core itself.
2. Run `composer update` to update locally.
3. Commit and push the updated json and lock file to your repo.
4. Run `bundle exec cap production deploy` to deploy your changes.
5. Go to your site, login and perform any pending database updates.
