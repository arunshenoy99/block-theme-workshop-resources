# A Step-by-Step Guide to Building Your Own Block Theme in WordPress

## Why should I build Block Themes?
1. With a Block Theme, a user can edit all parts of their website without writing code.
2. Block Themes enhance loading performance by loading styles only for the rendered blocks on a page.
3. theme.json handles all aspects of add_theme_support() via a easily manageable JSON structure.
4. Accessibility features such as Skip to Content, keyboard navigation, and landmarks are generated automatically without adding additional code.
5. By using the Styles interface, users can customize colors and typography for the website and for the blocks.

## Coding your block theme
1. Setup your local development environment.
   - [LocalWP](https://localwp.com/)
   - [Node.js](https//developer.wordpress.org/block-editor/getting-started/devenv/#node-development-tools)
   - Code Editor: ([VS Code](https://code.visualstudio.com/)) 
2. Setup a new site in LocalWP.
3. Inside your themes folder, create a new folder that will represent your theme name in kebab case.
   - [Theme Naming Guidelines](https://make.wordpress.org/themes/2013/02/26/clarifying-guidelines-for-theme-name/)
4. Open up your new theme folder in VS Code. This is where you will do most of your development.
5. Get the right extensions for VS Code that will help you in developing your theme.
   - ES7+ React/Redux/React-Native snippets
   - PHP DocBlocker
   - PHP Intelephense
   - PHP IntelliSense
   - WordPress Snippets
6. Setup your main stylesheet
   - Create a new file and name it `style.css`. This file represents your theme's [main stylesheet](https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/). 
   - Add your Theme name
   - Add your Organization name or your name as the theme author. 
   - Add a version to your theme by following [Semantic Versioning 2.0.0](https://semver.org/)
7. Setup your [theme.json](https://developer.wordpress.org/themes/advanced-topics/theme-json/)
   - Add the correct theme.json version.
   - Add the settings that you want the editor to show when your theme is active.
   - Add the styles that you want your blocks/site to have when your theme is active.
8. Setup your templates
    - Create a new directory and name it `templates`.
    - Create a new file in the templates directory and name it `index.html`. This file will act as the universal fallback to your posts/pages.
    - Everything in your HTML template files need to be blocks which will be defined using the block grammar syntax.
9. Activate your theme
   - Visit the themes section of your site and activate your name theme.  
   - Open up your template in the site editor and ensure that there are no errors.
10. Setup your patterns
    - Create a new directory and name it `patterns`.
    - Create a new file in the patterns directory and name it `<your_pattern_name_kebab_cased>.php`.
    - Add the pattern comment, the `title` and `slug` are required.
    - Add the necessary block grammar that you want, patterns provide access to PHP so the text can also be translated using `__`.
    - Use the pattern wherever necessary by using the block grammar `<!-- wp:pattern {"slug":"<your_theme_name>/<your_pattern_name_kebab_cased>"} /-->`
11. Setup your template parts
    - Create a new directory and name it `parts`
    - Create a new file in the parts directory and name it `<your_template_part>.html`
    - Add the necessary block grammar.
    - Use the template part in your templates by using the block grammar `<!-- wp:template-part {"slug":"<your_template_part>","tagName":"<your_template_part>"} /-->`
12. Setting up global styles variations
    - Create a new directory and name it `styles`.
    - Create a new file and name it with a kebab cased version of your variation title.
    - Add the necessary JSON and ensure that you use a unique title to avoid confusion.
    - This new variation will now be available in your site editor.
13. Add your screenshot
    - Take a screenshot of your theme that will be displayed in the Themes section of WordPress.
    - Rename the file to `screenshot.<png|gif|jpg>` and place this file at the root of your theme directory.
    - The dimensions of your screenshot should be 1200 x 900 pixels.
14. Take a look at the core blocks of WordPress. If you can achieve your design using just the core blocks then you are basically done, you go into the editor, play around with all the blocks and styles and export your theme.
15. The questions you need to ask yourself are
    - Can I achieve the necessary design by modifying the core blocks with my own custom CSS?
    - Can I achieve the necessary design by editing an already existing theme and export it?
    - Can I achieve the necessary design by creating child theme of an existing theme?
    - On a high level, the question you should be asking is, can I achieve the necessary design by just using the core blocks?
16. Nuances with using only core blocks 
    - Core Blocks can quickly become limited to your client's ever increasing requirements.
    - Core Styles are also limited, you might want to use SASS/Bootstrap.
    - You need complex queries that the query loop block cannot support.
    - [Separation of data and design](https://wordpress.org/documentation/article/comparing-patterns-template-parts-and-reusable-blocks/)

## Achieving complex designs with custom dynamic blocks
1. Create a new directory in your theme folder and name it `blocks`. The name is really up-to you and does not matter. This directory should house all your custom blocks.
2. Setting up your block directory for custom blocks.
   - Create a new directory and name it with an appropriate kebab cased block name. Ex `navigation-link` or `slideshow`.
   - Create a new file in this directory with the same name but using the `.js` extension. Ex `slideshow.js`. This will contain the frontend editor script for the block.
   - Create a new file in this directory with the same name but using the `.php` extension. Ex `slideshow.js`. This will contain the PHP Render callback to make your block dynamic.
   - Install the latest version of Node.js
   - In your theme folder, run `npm init`
   - In the new `package.json` file that was created by the previous command, add `@wordpress/scripts` to the dependencies object.
   - In your theme folder run `npm install`
   - In the new `package.json` file, add build and start scripts which will run the corresponding `wp-scripts` commands on the block js files.
   - Always version bust your build folder to prevent caching issues.
3. Setting up your custom block
   - In your new block folder, open up the `js` file.
   - Import `registerBlockType` from `@wordpress/blocks` and register your new block.
   - The first argument is the namespace of your block, use a unique namespace preferably `<your_block_theme>/<your_block_name>`
   - The second argument to this function is an object defining the block properties.
   - For a dynamic block let the save function return null and in case you are using `InnerBlocks` then only `<InnerBlocks.Content />`.
   - In your new block folder, open up the `php` file. This file will contain the code that will be rendered whenever your block is loaded in the front end also called the render_callback.
   - Store all the additional CSS, JS and Images in a folder called assets at the root of your theme directory.
4. Putting the block together in PHP and enqueueing all the assets at the right time.
   - At the root of your theme directory, create a new file named `functions.php`
   - Follow the pattern in this repository to setup your blocks, ensure that you also add the version to the build paths as necessary.
5. Test your block in the editor and the front end and make necessary changes without worrying too much about the block breaking in the editor.

## Important Notes

### Block Patterns vs Block Template Parts
1. Block Patterns are basically a collection of WordPress blocks arranged in a certain order and can be reused multiple times, once you insert a block pattern there is nothing that ties the pattern content to the pattern itself.
2. Block Template parts represent sections of your website and are also reusable, there is a connection between the template part content and the template part so when you modify a template part it automatically reflects across all your posts.

### Should I define my custom blocks in a plugin or a theme?
1. Whenever you build custom blocks, always ask yourself the question, will these blocks be useful only for my theme or can they be useful for other themes as well?    
   