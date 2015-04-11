
<?php

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\FacadesDB;

class PostCommentSeeder extends Seeder {

	public function run() {
		$content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。';
		$commentdammy = 'コメントダミーです。ダミーコメントだよ。';

		for( $i=1; $i<10; $i++ ) {
			$post = new Post;
			$post->title = "$1 番目の投稿";
			$post->content = $content;
			$post->cat_id = 1;
			$post->save();

			$maxComments = mt_rand(3, 15);
			for( $j=0; $j<=$maxComments; $j++ ) {
				$comment = new Comment;
				$comment->commenter = '名無しさん';
				$comment->comment = $commentdammy;

				// モデル（Post.php）のComments メソッドを読み込み、post_id にデータを保存する。
				$post->comment()->save($comment);
				$post->increment('comment_count');
			}
		}

		// カテゴリーの追加
		$cat1 = new Category;
		$cat1->name = '電化製品';
		$cat1->save();

		$cat2 = new Category;
		$cat2->name = '食品';
		$cat2->save();
	}
}




