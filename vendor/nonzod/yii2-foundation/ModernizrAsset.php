<?php

/**
 *  @copyright Copyright &copy; Digisin soc. coop, digisin.it 2014
 *  @package nonzod/yii2-foundation
 *  @version 1.0.0
 */

namespace nonzod\foundation;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset bundle for the modernizr js files.
 *
 * @author Nicola Tomassoni <nicola@digisin.it>
 * @since 0.0.1
 * @see
 */
class ModernizrAsset extends AssetBundle {

  public $sourcePath = '@bower/modernizr';

  public $js = [
      'modernizr.js'
  ];
  
  public $jsOptions = ['position' => View::POS_HEAD];

}
