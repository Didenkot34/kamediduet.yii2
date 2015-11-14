<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Comments;

/**
 * CommentsSearch represents the model behind the search form about `app\modules\admin\models\Comments`.
 */
class CommentsSearch extends Comments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comments', 'id_posts'], 'integer'],
            [['users_name', 'users_last_name', 'users_email', 'comments', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Comments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_comments' => $this->id_comments,
            'id_posts' => $this->id_posts,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'users_name', $this->users_name])
            ->andFilterWhere(['like', 'users_last_name', $this->users_last_name])
            ->andFilterWhere(['like', 'users_email', $this->users_email])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
