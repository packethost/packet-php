'use strict';
module.exports = function(grunt) {
    // show elapsed time at the end
    require('time-grunt')(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        phpcs: {
            application: { dir: ['src/**/*.php', 'tests/*.*/*.php'] },
            options: {
                bin: 'vendor/bin/phpcs',
                standard: 'ruleset.xml'
            }
        },
        phpunit: {
            default: { options: { configuration: 'phpunit.xml' } }
        }
    });
    grunt.loadNpmTasks('grunt-phpcs');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.registerTask('default', [
        'phpcs',
        'phpunit'
    ]);

    grunt.registerTask('ci', [
        'phpcs',
        'phpunit'
    ]);
};
