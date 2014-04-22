<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * This is the tinyMCE (rich text editor) configuration file. Please visit
 * http://tinymce.moxiecode.com for more information.
 */
if ($GLOBALS['TL_CONFIG']['useRTE']):

?>
<script>window.tinymce || document.write('<script src="<?php echo TL_ASSETS_URL; ?>assets/tinymce4/tinymce.gzip.js">\x3C/script>')</script>
<script>
tinymce.init({
  skin: "contao",
  selector: "#<?php echo $selector; ?>",
  language: "<?php echo Backend::getTinyMceLanguage(); ?>",
  element_format: "html",
  document_base_url: "<?php echo Environment::get('base'); ?>",
  entities: "160,nbsp,60,lt,62,gt,173,shy",
  init_instance_callback: function(editor) {
    editor.on('focus', function(){ Backend.getScrollOffset(); });
  },
  file_browser_callback: function(field_name, url, type, win) {
    Backend.openModalBrowser(field_name, url, type, win);
  },
  templates: [
    <?php echo Backend::getTinyTemplates(); ?>
  ],
  plugins: "autosave charmap code fullscreen image link paste searchreplace tabfocus table template visualblocks",
  browser_spellcheck: true,
  tabfocus_elements: ":prev,:next",
  content_css: "<?php echo TL_PATH; ?>/system/themes/tinymce.css",
  extended_valid_elements: "q[cite|class|title],article,section,hgroup,figure,figcaption",
  menubar: "file edit insert view format table",
  toolbar: "link image | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo | code",

  style_formats: [
    {title: 'Headers', items: [
      {title: 'h1', block: 'h1'},
      {title: 'h2', block: 'h2'},
      {title: 'h3', block: 'h3'},
      {title: 'h4', block: 'h4'},
      {title: 'h5', block: 'h5'},
      {title: 'h6', block: 'h6'}
    ]},
    {title: 'Blocks', items: [
      {title: 'p', block: 'p'},
      {title: 'div', block: 'div'},
      {title: 'pre', block: 'pre'}
    ]},
    {title: 'Containers', items: [
      {title: 'section', block: 'section', wrapper: true, merge_siblings: false},
      {title: 'article', block: 'article', wrapper: true, merge_siblings: false},
      {title: 'blockquote', block: 'blockquote', wrapper: true},
      {title: 'hgroup', block: 'hgroup', wrapper: true},
      {title: 'aside', block: 'aside', wrapper: true},
      {title: 'figure', block: 'figure', wrapper: true}
    ]}
  ],
  visualblocks_default_state: true,
  end_container_on_empty_block: true
});
</script>
<?php endif; ?>
