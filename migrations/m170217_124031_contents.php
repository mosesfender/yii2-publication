<?php

use yii\db\Migration;

class m170217_124031_contents extends Migration
{

    const TAB_CONTENT_CRUMBS = "{{%pub_crumb}}";
    const TAB_CONTENT_CRUMBS_PATH = "{{%pub_crumbs_path}}";
    const TAB_CONTENT = "{{%pub_content}}";
    const TAB_CONTENT_PATH = "{{%pub_content_crumbs}}";

    public function up()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        if ($this->db->schema->getTableSchema(self::TAB_CONTENT_CRUMBS, true) === null) {
            $this->createTable(self::TAB_CONTENT_CRUMBS, [
                "id" => $this->primaryKey(),
                "crumb_title" => $this->string(255)->notNull(),
                "crumb_description" => $this->text(),
                "status" => $this->integer()->defaultValue(0),
                "created_at" => $this->dateTime(),
                "update_at" => $this->dateTime()
            ]);
            $this->createIndex("i_status", self::TAB_CONTENT_CRUMBS, "status");
        }
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT_CRUMBS_PATH, true) === null) {
            $this->createTable(self::TAB_CONTENT_CRUMBS_PATH, [
                "crumb_parent_id" => $this->integer()->notNull()->defaultValue(0),
                "crumb_child_id" => $this->integer()->notNull()->defaultValue(0),
            ]);

            $this->createIndex("crumb_tree", self::TAB_CONTENT_CRUMBS_PATH, ["crumb_parent_id",
                "crumb_child_id"], TRUE);
            $this->createIndex("crumb_parent", self::TAB_CONTENT_CRUMBS_PATH, ["crumb_parent_id"]);
            $this->createIndex("crumb_child", self::TAB_CONTENT_CRUMBS_PATH, ["crumb_child_id"]);
        }
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT, true) === null) {
            $this->createTable(self::TAB_CONTENT, [
                "id" => $this->primaryKey(),
                "pub_title" => $this->string()->notNull(),
                "pub_subtitle" => $this->string(),
                "pub_suptext" => $this->text(),
                "pub_text" => $this->text(),
                "pub_subtext" => $this->text(),
                "created_at" => $this->dateTime()->defaultValue(0),
                "update_at" => $this->dateTime()->defaultValue(0),
                "status" => $this->integer()->notNull()->defaultValue(0),
            ]);
            $this->createIndex("i_status", self::TAB_CONTENT, "status");
        }
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT_PATH, true) === null) {
            $this->createTable(self::TAB_CONTENT_PATH, [
                "pub_id" => $this->integer()->notNull()->defaultValue(0),
                "crumb_id" => $this->integer()->notNull()->defaultValue(0)
            ]);
            $this->createIndex("pub_tree", self::TAB_CONTENT_PATH, ["pub_id", "crumb_id"], true);
            $this->createIndex("pub_id", self::TAB_CONTENT_PATH, "pub_id");
            $this->createIndex("cat_id", self::TAB_CONTENT_PATH, "crumb_id");
        }
    }

    public function down()
    {
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT, true) !== null) {
            $this->dropTable(self::TAB_CONTENT);
        }
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT_PATH, true) !== null) {
            $this->dropTable(self::TAB_CONTENT_PATH);
        }
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT_CRUMBS, true) !== null) {
            $this->dropTable(self::TAB_CONTENT_CRUMBS);
        }
        if ($this->db->schema->getTableSchema(self::TAB_CONTENT_CRUMBS_PATH, true) !== null) {
            $this->dropTable(self::TAB_CONTENT_CRUMBS_PATH);
        }

        return false;
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
