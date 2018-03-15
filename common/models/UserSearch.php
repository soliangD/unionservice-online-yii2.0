<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'birth_time', 'age'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'name', 'email', 'telphone', 'sex', 'specialty', 'city', 'address', 'work_experience', 'resume_link'], 'safe'],
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
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //分页
            'pagination'=>['pageSize'=>10,],
            //排序
            'sort'=>[
                'defaultOrder'=>[
                    'id'=>SORT_DESC, //默认用id降序
                ],
                //'attributes'=>['id','username','name'],   //允许用哪些字段排序
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // 当注释掉下一行，在验证错误时会查询出所有数据展示
            //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'birth_time' => $this->birth_time,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telphone', $this->telphone])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'specialty', $this->specialty])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'work_experience', $this->work_experience])
            ->andFilterWhere(['like', 'resume_link', $this->resume_link]);




        if(!empty($this->age)) {
            $query->andFilterWhere(['between', 'birth_time', mktime(0, 0, 0, 1, 1, (date('Y', time()) - $this->age)), mktime(0, 0, 0, 1, 1, (date('Y', time()) - $this->age + 1))]);
        }


        //年龄排序   年龄升序=出生日期降序
        $dataProvider->sort->attributes['age'] =
            [
                'asc' => ['birth_time'=>SORT_DESC],
                'desc' => ['birth_time'=>SORT_ASC],
            ];



        return $dataProvider;
    }
}
