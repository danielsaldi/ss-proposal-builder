## Getting Started

### Studio Science Theme
Built by Studio Science Development Team

### Setup and Commands
Installs wordpress/scripts dependancies
```
npm install
```

Watches style and script files for changes and automatically applies actions and minifies files for production into build folder
```
npm run preview
```

### Version Control
Versioning of the repository should follow the general guidelines of Semantic Versioning on semver.org. X.Y.Z (Major.Minor.Patch). Patches are self explanatory. New features, that do not break backward compatibility will increment the Y (Minor). New features that break backward compatibility or major revisions will increment the X (Major).

### GIT
The preferred GIT branching model should follow the general guidelines in the <a href="http://nvie.com/posts/a-successful-git-branching-model/" target="_blank">article</a> by Vincent Driessen, A successful Git branching model. It is highly recommended to learn and follow these guidelines.

### Branches
master or production -> Always stable. Supplies Production environment.
development -> Contains features and bug fixes currently being worked on. When stable, merged to master or release branch as applicable.
feature-* -> Branch off of develop. Used for creating new features. When approved, merged back to develop branch.
release-* or staging -> Branch from develop. Evaluation of release to go into production. Frees the develop branch to immediate take the next feature development pushes.
hotfix-* -> Used for fixes, when a critical bug is found in production.

### Issue Tracker
All bugs should be reported in the issue tracker. When working on the theme, please take a look at the tracker for outstanding issues.

### NPM
All dependencies (front-end and non-front-end) should be installed using NPM. These dependencies should be defined in package.json and saved in -save--dev flag. All dependencies need to be compiled and minified using gulp for production.

### Coding Style
Use tabs for indentation (no spaces)

### Naming convention
Lowercase names and underscores for variables, functions, and methods.
Uppercase names and underscores for class names
All caps for constants

## Templates

### Blocks
Blocks are the building parts of a View. The use of modules helps isolate blocks of code that help understand and maintain site being worked on by various team members.

### Partials
Partials are smaller building blocks that can help build modules. The main purpose of using partials and not repeating the same code on multiple Components. If you have an item or functionality on more that one Component, it should be a partial that is extended to the Component.

### Renaming your theme using Studio Science Template

1. Search for: `studioscience_` and replace with: `your_theme_name_`
2. Search for: `studioscience-` and replace with: `your-theme-name-`
3. Search for: `studioscience` and replace with: `your-theme-name`
4. Search for: `Studio Science` and replace with: `Your Theme Name`
5. Search for: `Studio_Science` and replace with: `Your_Theme_Name`
6. Search for: `Studio Science` and replace with: `Agency_Name`
7. Search for: `studioscience.com` and replace with: `agency.com`
8. Search for: `studioscience` and replace with: `agency`

Then, update the stylesheet header in `sass/style.scss` and rename `studioscience.pot` from `languages` folder to use the theme's slug. 

## File Structure

```
/your-theme-name/               # → Main theme folder in wp-content
├── acf-json/                   # → ACF local json files ( Local Json )
├── assets/                     # → Theme assets
│   ├── fonts/                  # → Theme fonts
│   ├── icons/                  # → Theme icons
│   └── images/                 # → Theme images
├── build/                      # → Build files for production (never directly edit)
├── inc/                        # → Theme PHP
│   ├── blocks/                 # → WordPress Blocks Registered, styled and render templates
│   ├── partials/               # → Building blocks that can help build modules
│   ├── filters.php             # → Theme filters
│   ├── helpers.php             # → Helper functions
│   └── setup.php               # → Theme setup
├── src/                        # → Theme JS
│   ├── index                   # → Custom Javascript
├── node_modules/               # → Node.js packages (never push to production server)
├── sass/                       # → Theme stylesheets
│   ├── base/                   # → Base theme styles folder 
│   │   ├── _normalize.scss     # → HTML element and attribute rulesets to normalize styles across all browsers
│   │   ├── global.scss         # → Global styles
│   │   ├── mixins.scss         # → Custom mixins
│   │   ├── typography.scss     # → Extendable typography styles        
│   │   └── variables.scss      # → Stylesheet variables
│   ├── partials/               # → Patial styles
│   ├── vendors/                # → Vendor styles
│   └── style.scss              # → Theme meta information and scss file imports
├── .gitignore                  # → Used by Git to determine which files and directories to ignore
├── 404.php                     # → Error page template
├── archive.php                 # → Blog post archive
├── comments.php                # → Comments template
├── footer.php                  # → Theme footer template
├── functions.php               # → Theme includes
├── header.php                  # → Theme header template
├── index.php                   # → Main template file
├── package.json                # → Node.js dependencies and scripts
├── page.php                    # → Main page template file
├── README.md                   # → This file
├── screenshot.png              # → Theme screenshot for WP admin
├── search.php                  # → Search form and result template
├── sidebar.php                 # → Sidebar template
├── single.php                  # → Blog article template
└── style.css                   # → Theme stylesheet (compiled and created by gulp task from sass folder)
```
