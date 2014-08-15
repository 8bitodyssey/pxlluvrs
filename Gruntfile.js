/* vim: set ft=javascript expandtab shiftwidth=2 tabstop=2: */

module.exports = function( grunt ) {

  // Project configuration
  grunt.initConfig( {
    pkg:  grunt.file.readJSON( 'package.json' ),
    jshint: {
      all: [
        'Gruntfile.js',
        'js/pxlluvrs.js'
      ],
      options: {
        curly:   true,
        eqeqeq:  true,
        immed:   true,
        latedef: true,
        newcap:  true,
        noarg:   true,
        sub:   true,
        undef:   true,
        boss:  true,
        eqnull:  true,
        devel: true,
        browser: true,
        globals: {
          window: true,
          exports: true,
          module:  false,
          jQuery: false,
          Console: false
        }
      }
    },
    uglify: {
      all: {
        files: {
          'js/pxlluvrs.min.js': [
            'js/pxlluvrs.js'
          ]
        },
        options: {
          banner: '/**\n' +
            ' * <%= pkg.title %> - v<%= pkg.version %>\n' +
            ' *\n' +
            ' * <%= pkg.homepage %>\n' +
            ' *\n' +
            ' * Copyright <%= grunt.template.today("yyyy") %>, <%= pkg.author.name %> (<%= pkg.author.url %>)\n' +
            ' * Released under the GNU General Public License v2 or later\n' +
            ' */\n',
          mangle: {
            except: ['jQuery']
          }
        }
      }
    },

    compass: {
      dist: {
        options: {
          sassDir: '_sass',
          cssDir: 'css',
          outputStyle: 'expanded',
          imagesDir: 'images',
          javascriptsDir: 'js'
        }
      }
    },
    cssmin: {
      options: {
      banner: '/*\n' +
        'Theme Name: <%= pkg.title %>\n' +
        'Theme URI: <%= pkg.homepage %>\n' +
        'Author: <%= pkg.author.name %>\n' +
        'Author URI: <%= pkg.author.url %>\n' +
        'Description: <%= pkg.description %>\n' +
        'Version: <%= pkg.version %>\n' +
        'License: GNU General Public License v2 or later\n' +
        'License URI: http://www.gnu.org/licenses/gpl-2.0.html\n' +
        'Text Domain: pxl\n' +
        'Domain Path: /languages/\n' +
        'Tags:\n' +
        '*/\n'
      },
      combine: {
        files: {
          'style.css': [
            'css/style.css',
            'css/app.css'
          ]
        }
      }
    },
    watch: {
      scripts: {
        files: [
          '_sass/*.scss',
          '_sass/*/*.scss',
          'js/pxlluvrs.js'
        ],
        tasks: ['jshint', 'uglify', 'compass', 'cssmin']
      }
    },
    browserSync: {
      dev: {
          bsFiles: {
              src : 'style.css'
          },
          options: {
              proxy: "8bitodyssey.dev"//,
              //"themes": "../www/wordpress/wp-content/themes/pxlluvrs/**"
              //watchTask: true // < VERY important
          }
      }
    }
  } );
  //
  // Load other tasks
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  //grunt.loadNpmTasks('grunt-contrib-watch');
  //grunt.loadNpmTasks('grunt-browser-sync');

  // Default task.
  grunt.registerTask(
    'default',
    //['jshint', 'uglify', 'compass', 'cssmin', 'browserSync', 'watch']
    ['jshint', 'uglify', 'compass', 'cssmin']
  );

  grunt.util.linefeed = '\n';
};
