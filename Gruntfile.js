module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
        	dist: {
    	        src: [
    	            'js/dep/jquery.min.js',
    	            'js/vendors/*.js'
    	        ],
    	        dest: 'js/build/vendors.js',
    	    }
        },
        uglify: {
            build: {
                src: 'js/build/vendors.js',
                dest: 'js/build/vendors.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'style.css': 'style.scss'
                }
            } 
        },
        watch: {
        	options: {
        	    livereload: {
        	    	host: 'localhost',
        	    	port: 35729
        	    }
        	},
            css: {
                files: ['*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            },
            scripts: {
                files: ['js/**/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.registerTask('default', ['watch']);
};