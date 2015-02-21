<?php
class Register_Customtypes {

  public $post_type_name;

  /*
   * To initialiing this class.
   *
   * @param post_type name which shuld be alphabetic.
   */
  function __construct( $name ) {

    // Set public usage variables
    $this->post_type_name = strtolower( str_replace( ' ', '_', $name ) );

  }

  /*
   * Create a post type
   *
   * @param Appears on admin menu, multibyte character will accepted.
   * @param Set $labels to override attributes.
   * @param Set $args to override attributes.
   *
   * @link https://developer.wordpress.org/reference/functions/register_post_type/
   */
  function add_post_type( $label, $labels = array(), $args = array() ) {

    $this->post_type_args = $args;
    $this->post_type_labels = $labels;

    $labels = array_merge(
      $labels = array(
        'name'                  => _x( $label, 'post type general name' ),
        'singular_name'         => _x( $label, 'post type singular name' ),
        'menu_name'             => $label,
        'all_items'             => $label . '一覧',
        'add_new'               => '新規追加',
        'add_new_item'          => '新しい記事を追加',
        'edit'                  => '編集',
        'edit_item'             => $label . 'を編集',
        'new_item'              => '新しい' . $label,
        'view'                  => $label . 'の記事を表示',
        'view_item'             => $label . 'の記事を表示',
        'search_item'           => $label . 'の記事を探す',
        'not_found'             => $label . 'の記事が見つかりません',
        'not_found_in_trash'    => 'ゴミ箱に' . $label . 'の記事はありません',
        'parent'                => 'Parent ' . $label
      ),
      $this->post_type_labels
    );

    $args = array_merge(
      $args = array(
        'label'                 => $label,
        'labels'                => $labels,
        'description'           => '',
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => array( 'slug' => $this->post_type_name, 'with_front' => true ),
        'query_var'             => true,
        'has_archive'           => true,
        'supports'               => array( 'title', 'editor' ),
        'menu_position'         => 8
      ),
      $this->post_type_args
    );

    // Register the post type
    register_post_type( $this->post_type_name, $args );

  }

  /*
   * Create a taxonomy
   *
   * @parm taxonomy name which shuld be alphabetic.
   * @parm Appears on admin menu, multibyte character will accepted.
   * @parm Set $labels to override attributes.
   * @parm Set $args to override attributes.
   *
   * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
   */
  function add_taxonomy( $taxonomy, $label, $labels = array(), $args = array() ) {

    $labels = array_merge(
      array(
        'name'                  => $label,
        'singular_name'         => $label,
        'search_items'          => $label . 'を検索',
        'popular_items'         => 'よく使われている' . $label,
        'all_items'             => '全ての' . $label,
        'parent_item'           => '親' . $label,
        'parent_item_colon'     => '',
        'edit_item'             => $label . 'の編集',
        'update_item'           => '更新',
        'add_new_item'          => '新規' . $label . 'を追加',
        'new_item_name'         => '新しい' . $label,
        'add_or_remove_items'   => $label . 'を削除',
        'choose_from_most_used' => '',
        'menu_name'             => $label,
      ),
      $labels
    );

    $args = array_merge(
      array(
        'label'                 => $label,
        'labels'                => $labels,
        'public'                => true,
        'show_in_nav_menus'     => true,
        'show_admin_column'     => false,
        'hierarchical'          => false,
        'show_tagcloud'         => true,
        'show_ui'               => true,
        'query_var'             => true,
        'rewrite'               => true,
        'query_var'             => true,
        'capabilities'          => array(),
      ),
      $args
    );

    register_taxonomy( $taxonomy, $this->post_type_name, $args );

  }

}
