<?php


/**
 * Provides the 'Custom Footer Block' Block
 *
 * @Block(
 *   id = "custom_footer_bottom_block",
 *   admin_label = @Translation("Custom Footer Block"),
 * )
 */


namespace Drupal\tech_droppin\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity;

class CustomFooterBlock extends BlockBase implements \Drupal\Core\Block\BlockPluginInterface
{

    /**
    * {@inheritdoc}
    */
    public function getCacheMaxAge() {
      return 0;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        \Drupal::service('page_cache_kill_switch')->trigger();
        $o = "";
        
        $config = \Drupal::config('system.site');
        $o .= '<div class="footer-copyright">';
        $o .='<p>&copy; '.date('Y').' '.$config->getOriginal("name", false).'. All Rights Reserved.</p>';
        $o .= '<div class="menu-footer">';
        $form['#markup'] = $o;
        $form['#cache']['max-age'] = 0;
        $form['#allowed_tags'] = [
            'div', 'script', 'style', 'link', 'form',
            'h2', 'h1', 'h3', 'h4', 'h5',
            'table', 'thead', 'tr', 'td', 'tbody', 'tfoot',
            'img', 'a', 'span', 'option', 'select', 'input',
            'ul', 'li', 'br', 'p', 'link', 'hr', 'style', 'img',
        ];
        return $form;

    }

}

