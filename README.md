<img src="Laravel-8-From-Scratch-Wallpaper.png" />

## Welcome to my sandbox

This blog template project began with me following the Laravel 8 tutorial at [Laracasts.com](https://laracasts.com/series/laravel-8-from-scratch). In it, [Jeffrey Way](https://github.com/JeffreyWay) discusses how the reason we learn tools is not just for the sake of learning tools, rather it is because those tools help us accomplish a goal. Well, my goal with this project is to expand my skillset, learn coding, and thereby improve my livelihood on a new career path that I feel I mistakenly overlooked in my youth. So, in that spirit, I will often come back to this project and update it if I need to learn something new. Feel free to follow along, fork, add issues, make suggestions, whatever (because, honestly, I need to learn Github, too!)

## Follow along

For those who have not completed the [Laravel 8 from Scratch](https://laracasts.com/series/laravel-8-from-scratch) tutorial and subsequently followed my meandering path through IDEs and dependancies, here are the steps you need to take to set up your environment if you plan to clone this repo.

First of all, download and install Homebrew. You can do this at [brew.sh](https://brew.sh). I work on a Mac as well as a Linux VM on a Chromebook, so this appeared to be the best option for me. The instructions on the site are pretty clear so I won't bore you with them here.

After that, type this into your terminal:

`brew install php`

I mean, obviously, right? PHP is pretty much the basis of what I've been learning.

Next enter this into the terminal:

`brew install mysql`

After MySQL is installed you'll want to run `brew services start mysql` to make sure it's always running in the background. If you don't already have your own MySQL database, sign into it with `mysql -u root` to get it initialized.

Now you'll need PHP's dependency manager, [Composer](https://getcomposer.org/install). At that website you'll find simple copy/paste terminal commands to download and install Composer. [Composer/Getting Started](https://getcomposer.org/doc/00-intro.md#globally) also has some pretty easy instructions to make the `composer` command available globally on your machine.

So, basically, while Homebrew is available to install a whole host of different things to your computer, Composer does the same thing, but strictly for PHP.

Using Composer, download the Laravel installer with 

`composer global require laravel/installer`

This will make the Laravel installer available, but you'll have to figure out a way to make the `laravel` command available globally. Laracasts lays out how to do this [here](https://laracasts.com/series/laravel-8-from-scratch/episodes/3).

Here's where things get tricky. Again, let me express how much of a beginner I am. After this step, following the tutorial, I ran the command `laravel new blog` and it downloaded and created all the packages I needed to start the blog. If you're just following along with MY blog, I'm not sure whether or not you need to run this command. Although, I guess it couldn't hurt if you do.

At this point, you can probably go ahead and clone my blog. Just make sure that if you ran `compoer create-project` that you clone it into the same directory.

(Don't forget `php artisan serve` to see the site and `brew services start myql` to start up the database.)

**But we're not done there.** After following the tutorial for a while I noticed that my editor (VS Code) wasn't showing me all the hints and shortcuts that I was seeing available in the videos I was watching. I learned this was because of the IDE and that I needed to run an IDE helper. So I found one here: [Laravel IE Helper](https://github.com/barryvdh/laravel-ide-helper). To be honest, I don't know whether or not anything will break if you don't install this, but it has been a tremendous help for me in any case.

Eventually I learned about TALL stack. I knew I was using Tailwind, Alpine, and Laravel, but I knew nothing about [Livewire](https://laravel-livewire.com/). So I installed it. I don't think I've used anything from it yet, though. So, again, I don't know if it'll break things or not, but it's there.

Lastly, in the default Laravel install, I found that [Tailwind](https://tailwindcss.com) was implemented through a script in the head tag. I was having a little trouble getting what I wanted out of Tailwind, so I decided to fully download and install it locally to see if I could fix what I was doing. If you go to the [Tailwind Framework Guides](https://tailwindcss.com/docs/installation/framework-guides) and click on the Laravel logo, it'll show you how to do this in a Laravel environment. I'll say it again, I don't know if not having it will break things, but like all the other things I said that about, it definitely wrote some files and ammended some others that were already there, so better safe than sorry.

After alllll that is done, you'll want to fill up the database with some nonsense so you can actually see the blog working. Enter this command from the `blog` directory:

`php artisan migrate:fresh --seed`

This should actually also act as a pretty good test to see if everything is running correctly

That should be it! Right now I'm going to install something I just discovered called [Laravel Valet](https://laravel.com/docs/8.x/valet#installation) which should let me access the blog through https://blog.test instead of https://127.0.0.1. So, if you're following along, do that too. :) 

Have fun!

(EDIT: Nope! Don' do that! Homebrew is not currently supported for Valet! Sorry!)