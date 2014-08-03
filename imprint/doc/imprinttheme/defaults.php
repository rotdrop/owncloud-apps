<?php

class OC_Theme
{
  private static $defaults = false;
  private static $L = false;

  private static function init()
  {
    if (self::$defaults === false) {
      self::$defaults = new OC_Defaults();
      self::$L = new OC_L10n('imprint');
    }
  }

  // Add a link to the imprint page in the footer. This is just an
  // example how this could be done. YMMV.
  public function getShortFooter()
  {
    self::init();
    $footer = '<span class="footer"><a href="'
      .self::$defaults->getBaseUrl()
      ."\" target=\"_blank\">"
      .self::$defaults->getEntity()
      . "</a>"
      .' – '
      . self::$defaults->getSlogan()
      .' - '
      .'<a href="'.\OCP\Util::linkTo('imprint', 'index.php').'">'
      .self::$L->t('Legal notice')
      .'</a></span>';
    return $footer;
  }
};

?>
