<?php
namespace Drupal\companies\Controller;

use Drupal\companies\Companies\Companies;
use Drupal\users\Users\Users;
use Drupal\Core\Render\Renderer;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CompaniesController extends ControllerBase {

  protected $renderer;

  public function __construct(Renderer $renderer) {
    $this->renderer = $renderer;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('renderer')
    );
  }

  public function employees() {
    $user = new Users();
    $users_company = $user->company();
    $company = new Companies($users_company);
    $id =  $company->id();
    $view = views_embed_view('employees', 'block_1', $id);
    $build = array(
      '#type'   => 'markup',
      '#title' => 'Invite employees',
      '#markup' => $this->renderer->render($view),
      '#cache'  => [ 'max-age' => 0, ],
    );

    return $build;
  }
}
