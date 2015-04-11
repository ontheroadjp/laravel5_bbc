<?php namespace App\Models;

//use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	public function Comment() {
		// 投稿はたくさんのコメントを持つ
		return $this->hasMany('App\Models\Comment', 'post_id');
	}

	public function Category() {
		// 投稿は1つのカテゴリーに属する
		return $this->belongsTo('App\Models\Category', 'cat_id');
	}
}

?>



