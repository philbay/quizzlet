<?php 
// controller de haut niveau 


abstract class Controller
{

    public function loadModel(string $model)
    {
        require_once(ROOT .'models/' .$model .'.php');  //ROOT est une cst dans une autre page (a modifier)
        $this->$model = new $model();
    }


public function render($vue, array $data = [])
{
    /*var_dump($data);
    print("****");*/
    if(!empty($data))
        extract($data);
   /* var_dump($articles);
    die(); // pour arreter l'execution a ce niveau ou elle est appele, c'est comme return
    */
    
    // On demarre le buffer de sortie
    // ob_start();
    // On genere la vue
    require_once(ROOT. 'views/'. strtolower(get_class($this)). '/'. $vue . '.php');

    // on stocke le contenu dans $content
    // $content = ob_get_clean();

    // On fabrique le "template"
    // require_once(ROOT. 'views/layout/default.php');
}
}
//test
/*$test=new controller();
$test->loadModel('Article');
$test->Article->getAll();*/

?>