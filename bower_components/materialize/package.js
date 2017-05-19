// package metadata file for Meteor.js

Package.describe({
  name: 'materialize:materialize',  // http://atmospherejs.com/materialize/materialize
  summary: 'Materialize (official): A modern responsive front-end framework based on Material Design',
  version: '0.98.2',
  git: 'https://github.com/Dogfalo/materialize.git'
});


Package.onUse(function (api) {
  api.versionsFrom('METEOR@1.0');

  api.use('fourseven:sass@3.10.0');
  api.use('jquery', 'client');
  api.imply('jquery', 'client');

  var assets = [
    'fonts/roboto/Roboto-Bold.woff',
    'fonts/roboto/Roboto-Bold.woff2',
    'fonts/roboto/Roboto-Light.woff',
    'fonts/roboto/Roboto-Light.woff2',
    'fonts/roboto/Roboto-Medium.woff',
    'fonts/roboto/Roboto-Medium.woff2',
    'fonts/roboto/Roboto-Regular.woff',
    'fonts/roboto/Roboto-Regular.woff2',
    'fonts/roboto/Roboto-Thin.woff',
    'fonts/roboto/Roboto-Thin.woff2',
  ];

  addAssets(api, assets);

  api.addFiles([
    'dist/js/materialize.js'
  ], 'client');

  var scssFiles = [
    'sass/components/date_picker/_default.date.sass',
    'sass/components/date_picker/_default.sass',
    'sass/components/date_picker/_default.time.sass',
    'sass/components/forms/_checkboxes.sass',
    'sass/components/forms/_file-input.sass',
    'sass/components/forms/_forms.sass',
    'sass/components/forms/_input-fields.sass',
    'sass/components/forms/_radio-buttons.sass',
    'sass/components/forms/_range.sass',
    'sass/components/forms/_select.sass',
    'sass/components/forms/_switches.sass',
    'sass/components/_badges.sass',
    'sass/components/_buttons.sass',
    'sass/components/_cards.sass',
    'sass/components/_carousel.sass',
    'sass/components/_chips.sass',
    'sass/components/_collapsible.sass',
    'sass/components/_color.sass',
    'sass/components/_dropdown.sass',
    'sass/components/_global.sass',
    'sass/components/_grid.sass',
    'sass/components/_icons-material-design.sass',
    'sass/components/_materialbox.sass',
    'sass/components/_mixins.sass',
    'sass/components/_modal.sass',
    'sass/components/_navbar.sass',
    'sass/components/_normalize.sass',
    'sass/components/_prefixer.sass',
    'sass/components/_preloader.sass',
    'sass/components/_pulse.sass',
    'sass/components/_roboto.sass',
    'sass/components/_sideNav.sass',
    'sass/components/_slider.sass',
    'sass/components/_table_of_contents.sass',
    'sass/components/_tabs.sass',
    'sass/components/_tapTarget.sass',
    'sass/components/_toast.sass',
    'sass/components/_tooltip.sass',
    'sass/components/_transitions.sass',
    'sass/components/_typography.sass',
    'sass/components/_variables.sass',
    'sass/components/_waves.sass',
    'sass/materialize.sass'
  ];

  api.addFiles(scssFiles, 'client');


  api.export('Materialize', 'client');
});


function addAssets(api, assets){
  if(api.addAssets){
    api.addAssets(assets, 'client');
  } else {
    api.addFiles(assets, 'client', {isAsset: true});
  }
}
