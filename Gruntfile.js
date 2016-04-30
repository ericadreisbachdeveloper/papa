module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    concat: {
      js: {
        src: ['js/home.js'],
        dest: 'js/<%= pkg.name %>.min.js'
      }
    },

    uglify: {
      js: {
        src: ['js/home.js'],
        dest: 'js/<%= pkg.name %>.min.js'
      },
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('default', ["concat","uglify"]);

};
