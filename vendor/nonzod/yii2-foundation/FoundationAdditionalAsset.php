<?php

/**
 *  @package nonzod/yii2-foundation
 *  @version 1.0.0
 */

namespace nonzod\foundation;

use yii\web\AssetBundle;

/**
 * Asset bundle for the foundation css and js files.
 *
 * @author Nicola Tomassoni <nicola@digisin.it>
 * @since 0.0.1
 * @see
 */
class FoundationAdditionalAsset extends AssetBundle {

  public $sourcePath = '@bower/foundation';
  public $css = [
  ];
  public $js = [
      'js/foundation/foundation.offcanvas.js'
  ];
  public $depends = [
  ];
}
