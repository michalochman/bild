module.exports = function(grunt) {

    grunt.file.defaultEncoding = 'utf8';

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint: {
            files: [
                'js/main.js'
            ]
        },
        compass: {
            dist: {
                options: {
                    config: 'config.rb'
                }
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                filter: 'isFile',
                files: {
                    'build/js/compiled.js': [
                        '!js/modernizr.custom.js',
                        'js/*.js'
                    ]
                }
            }
        },
        uglify: {
            options: {
                banner: ''
            },
            dist: {
                files: {
                    'compiled.min.js': ['build/js/compiled.js'],
                    'modernizr.min.js': ['js/modernizr.custom.js']
                }
            }
        },
        cssmin: {
            dist: {
                files: {
                    'screen.min.css': ['build/css/screen.css'],
                    'ie.min.css': ['build/css/ie.css']
                }
            }
        }
//        , copy: {
//            dist: {
//                src: 'build/js/modernizr.custom.js',
//                dest: 'modernizr.js'
//            }
//        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task(s).
    grunt.registerTask('default', ['jshint']);
    grunt.registerTask('compilejs', ['jshint', 'concat', 'uglify']);
    grunt.registerTask('compilecss', ['compass', 'cssmin']);
    grunt.registerTask('compile', ['compilejs', 'compilecss']);
};
