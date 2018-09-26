<?php
/**
 * @package	HS Product Import
 * @version	1.0
 * @author	www.joomdev.com
 * @copyright	(C) 2009-2016  JoomDev. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
if(version_compare(JVERSION,'2.5','<')){
	jimport('joomla.html.parameter');
	$params = new JParameter('');
} else {
	$params = new JRegistry('');
}
$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$name = $this->params->get('hshc_name');
$link = $this->params->get('hshc_link');
$cart = $this->params->get('hshc_cart');
$picture = $this->params->get('hshc_picture');
$description = $this->params->get('hshc_description');
$desc_color = $this->params->get('desc_color');
$link_details = $this->params->get('hshc_link_details');
$link_color = $this->params->get('link_color');
$hshc_link_details_color = $this->params->get('hshc_link_details_color');
$link_details_options = $this->params->get('link_details_options');
$js = '';
global $Itemid;
$config =& hikashop_config();
$custom_itemid = $this->params->get('itemid');
//var_dump($params);
$style_width = $this->params->get('temes_style_size');
$temes = $this->params->get('temes_style');
$style="";
if($this->picture == $temes) {
$style  .= '<style>';
$style  .= '.card-action_line{';
//$style  .= 'border-top: 1px solid rgba(160,160,160,0.2);';
//$style  .= 'margin-left:-15px;'; 
$style  .= 'padding:0px;';
$style  .= '    z-index: 2;';
$style  .= 'width:'.$style_width.'px!important;';   
$style  .= '}';
$style  .= '.card-action{';
$style  .= 'position: relative;';
$style  .= 'background-color: inherit;';

$style  .= 'padding:5px 0px;';
$style  .= '    z-index: 2;';
//$style  .= 'width:100%!important;';   
$style  .= '}';
$style  .= '.card-action-contener{';
$style  .= 'padding:15px;';

$style  .= '}';
$style  .= '.hikashop_short_code{';

$style  .= 'width:'.$style_width.'px!important;';
$style  .= 'box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);';

//$style  .= 'float:left;';
$style  .= '}';
$style  .= '.hikashop_product_details a,card-action-contener a{';
$style  .= 'color:'.$hshc_link_details_color.';';
$style  .= 'float:none;';
$style  .= 'transition: color 0.5s!important;';
//$style  .= 'padding:15px 0px;';
//$style  .= 'margin-top:-15px;';
$style  .= '}';
$style  .= '#system-readmore{';
$style  .= 'display:none;';
$style  .= '}';
$style  .= '.card-action-contener a:hover{';
$style  .= 'text-decoration:none!important;';
$style  .= '}';
$style  .= 'span.hikashop_short_code_product_name{';

$style  .= 'width:'.$style_width.'px;';
//$style  .= 'position: absolute;';
//$style  .= 'position: relative;';
//$style  .= 'margin-top:-60px;';
//$style  .= 'padding:5px 15px;';
//$style  .= 'line-height: 28px;';
$style  .= 'font-size: 24px;';
//$style  .= 'font-weight: 300;';
$style  .= 'color:'.$link_color.';';
//$style  .= 'float:left;';
$style  .= '}';
$style  .= '.card-action-contener p span,.card-action-contener p{';
$style  .= 'color:'.$desc_color.'!important;';
$style  .= '}';
$style  .= '.hikashop_short_code_product_description{';

$style  .= 'width:'.$style_width.'px;';
$style  .= 'position: relative;';
$style  .= 'color:'.$desc_color.';';
$style  .= 'float:left;';
$style  .= '}';
$style  .= '</style>';
echo $style;
} 

$productClass = hikashop_get('class.product');

 

foreach($products as $product) {
	if(in_array($product->product_id,$id)){
		//echo '<div class="hikashop_short_code" style="text-align:center;">';
		$_SESSION['hikashop_product']=$product;
		//if($this->border == 1 ) echo '<div class="hikashop_subcontainer hikashop_subcontainer_border">';
		$productClass->addAlias($product);
		$url_itemid = '';
		if(!empty($custom_itemid)){
			$url_itemid = '&Itemid='.(int)$custom_itemid;
		}
		elseif(!empty($Itemid)){
			$url_itemid = '&Itemid='.(int)$Itemid;
		}
		elseif($this->menuid != 0){
			$url_itemid = '&Itemid='.(int)$this->menuid;
		}
		$link = hikashop_contentLink('product&task=show&cid='.$product->product_id.'&name='.$product->alias.$url_itemid,$product);
		if(!empty($product->product_canonical)){
			$link = hikashop_cleanURL($product->product_canonical);
		}
		 ?>
<!-- HS Product Import 1.0 by www.joomdev.com Start -->
<style>
.hikashop_short_code_product_description{
	padding:16px 9px 0px 0px;
}
.hikashop_product_stock_count{
	display:none;
}
.hikashop_product_image{
	padding-bottom:10px;
}

a.hikashop_cart_button, a.hikashop_compare_button, .hikashop_cart_input_button {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border-color: #bbbbbb #bbbbbb #a2a2a2;
    border-image: none;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    line-height: 18px;
    margin-bottom: 0;
    padding: 4px 12px;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
}
</style>		 
			<div class="hikashop_short_code" style="text-align:center;">
			
			<!-- PRODUCT IMG -->
			<div style="width:<?php echo $style_width;?>px;" class="hikashop_product_image">
				<?php if($this->picture == $picture) {
						if(!empty($product->images)){
							$image =reset($product->images);
							$image_options = array('default' => true,'forcesize'=>$config->get('image_force_size',true),'scale'=>$config->get('image_scale_mode','inside'));
							$img = $this->image->getThumbnail(@$image->file_path,  $image_options);
							if($img->success) {
							echo '<img itemprop="image" src="' . $this->image->uploadFolder_url . $image->file_path . '" alt="' . $image->file_name . '" id="hikashop_short_code_image" style="margin-bottom:10px;display:inline-block;vertical-align:middle" style="width:'.$style_width.'px!important;"/>';
							}
						}
					 } ?>

			</div>	
		  <!-- PRODUCT NAME-->	
		  
			<?php if($this->name == $name) {?>
				<span class="hikashop_short_code_product_name">
					<?php echo $product->product_name;?>
				</span>
			<?php } ?>
			
			<!-- PRODUCT DESCRIPTION -->
			
			<?php if($this->description == $description) {?>
			<div class="hikashop_short_code_product_description">
        		<?php echo $product->product_description;?>
			</div>	
			<?php } ?>
			
			<!-- PRODUCT ADD TO CART BUTTON -->
			
			<?php if($this->cart == $cart) {?>
			<div class="card-action-contener">
							<span class="hikashop_add_to_cart">
							<?php
							
							
							if(!empty($product->prices)){
							    $price = reset($product->prices);
								$currencyHelper = hikashop_get('class.currency');
								echo $currencyHelper->format($price->price_value_with_tax,$price->price_currency_id);
							}
								$params->set('price_with_tax',$config->get('price_with_tax',1));
								$params->set('add_to_cart',1);
								$scripts_already = count($doc->_scripts);
								$css_already = count($doc->_styleSheets);
								$add_to_cart = hikashop_getLayout('product','add_to_cart_listing',$params,$js);
								echo $add_to_cart;
								foreach($doc->_scripts as $script => $v) {
									if($scripts_already){
										$scripts_already--;
										continue;
									}
									echo '<script src="'.$script.'" type="text/javascript"></script>';
								}
								foreach($doc->_styleSheets as $css => $v) {
									if($css_already){
										$css_already--;
										continue;
									}
									echo '<style type="text/css">'."\r\n@import url(".$css.");\r\n".'</style>';
								}
								foreach($doc->_script as $script) {
									echo '<script type="text/javascript">'."\r\n".$script."\r\n".'</script>';
								}
							?>
							</span>
						</div>
						
			<?php } ?>	

			<!-- PRODUCT DETAILS BUTTON -->
			<?php	 if($this->name == $link_details_options) { ?>			
						<span class="hikashop_product_details">
								   <div class="card-action-contener">
										<?php if($this->link == $link){ ?>
											<a class="btn btn-info" href="<?php echo $link;?>">
										<?php }
											echo $link_details;
										if($this->link == $link){ ?>
											</a>
										<?php } ?>
								  </div>
						</span>
			<?php } ?>
			
			</div>
			<!-- HS Product Import 1.0 by www.joomdev.com Emd -->
	<?php } 
	
	
}	?>
			
 
			

			