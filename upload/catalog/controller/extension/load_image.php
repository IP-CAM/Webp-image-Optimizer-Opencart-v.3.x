<?php
class ControllerExtensionLoadImage extends Controller {
    
    public function index() {

            $this->load->model('catalog/product');
            $this->load->model('tool/image');

            $products = $this->model_catalog_product->getProducts();

            foreach ($products as $product) {
                $url =  $this->url->link('product/product', 'product_id=' . $product['product_id']);
                file_get_contents($url);
                sleep(1);
            }

            $this->load->model('catalog/category');
            $this->getCategories(0);

            $this->load->model('catalog/information');

            $information = $this->model_catalog_information->getInformations();
            foreach ($information as $information) {
                $url = $this->url->link('information/information', 'information_id=' . $information['information_id']);
                file_get_contents($url);
                sleep(1);
            }


    }

    protected function getCategories($parent_id, $current_path = '') {
        $results = $this->model_catalog_category->getCategories($parent_id);
        foreach ($results as $result) {
            $new_path = !$current_path ? $result['category_id'] : $current_path . '_' . $result['category_id'];
            $url = $this->url->link('product/category', 'path=' . $new_path);
            file_get_contents($url);
            sleep(1);
            $this->getCategories($result['category_id'], $new_path);
        }
    }
}
