<?php

use yii\db\Schema;
use jamband\schemadump\Migration;
use jamband\schemadump\SchemadumpController;

class m150427_161630_kesco_test_tables extends Migration
{
    public function safeUp()
    {
      // AuthAssignment
$this->createTable('{{%AuthAssignment}}', [
    'item_name' => Schema::TYPE_STRING . "(64) NOT NULL",
    'user_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'created_at' => Schema::TYPE_INTEGER . " NULL",
    'PRIMARY KEY (item_name, user_id)',
], $this->tableOptions);

// AuthItem
$this->createTable('{{%AuthItem}}', [
    'name' => Schema::TYPE_STRING . "(64) NOT NULL",
    'type' => Schema::TYPE_INTEGER . " NOT NULL",
    'description' => Schema::TYPE_TEXT . " NULL",
    'rule_name' => Schema::TYPE_STRING . "(64) NULL",
    'data' => Schema::TYPE_TEXT . " NULL",
    'created_at' => Schema::TYPE_INTEGER . " NULL",
    'updated_at' => Schema::TYPE_INTEGER . " NULL",
    'PRIMARY KEY (name)',
], $this->tableOptions);

// AuthItemChild
$this->createTable('{{%AuthItemChild}}', [
    'parent' => Schema::TYPE_STRING . "(64) NOT NULL",
    'child' => Schema::TYPE_STRING . "(64) NOT NULL",
    'PRIMARY KEY (parent, child)',
], $this->tableOptions);

// AuthRule
$this->createTable('{{%AuthRule}}', [
    'name' => Schema::TYPE_STRING . "(64) NOT NULL",
    'data' => Schema::TYPE_TEXT . " NULL",
    'created_at' => Schema::TYPE_INTEGER . " NULL",
    'updated_at' => Schema::TYPE_INTEGER . " NULL",
    'PRIMARY KEY (name)',
], $this->tableOptions);

// ae_area
$this->createTable('{{%ae_area}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
    'division_id' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// agency
$this->createTable('{{%agency}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(200) NULL",
    'name_en' => Schema::TYPE_STRING . "(200) NULL",
], $this->tableOptions);

// circle
$this->createTable('{{%circle}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(200) NULL",
    'name_en' => Schema::TYPE_STRING . "(200) NULL",
    'shortcode' => Schema::TYPE_STRING . "(7) NULL",
], $this->tableOptions);

// civil
$this->createTable('{{%civil}}', [
    'id' => Schema::TYPE_PK,
    'totvalue' => Schema::TYPE_DOUBLE . " NULL",
    'dateofstart' => Schema::TYPE_DATE . " NULL",
    'status' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// department
$this->createTable('{{%department}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
], $this->tableOptions);

// designation
$this->createTable('{{%designation}}', [
    'id' => Schema::TYPE_PK,
    'designation_type_id' => Schema::TYPE_INTEGER . " NULL",
    'level_id' => Schema::TYPE_INTEGER . " NULL",
    'officer_name_hi' => Schema::TYPE_STRING . "(100) NULL",
    'officer_name_en' => Schema::TYPE_STRING . "(100) NULL",
    'officer_mobile' => Schema::TYPE_STRING . "(12) NULL",
    'officer_mobile1' => Schema::TYPE_STRING . "(12) NULL",
    'officer_email' => Schema::TYPE_STRING . "(50) NULL",
    'officer_userid' => Schema::TYPE_STRING . "(10) NULL",
    'name_hi' => Schema::TYPE_STRING . " NULL",
    'name_en' => Schema::TYPE_STRING . " NULL",
], $this->tableOptions);

// designation_type
$this->createTable('{{%designation_type}}', [
    'id' => Schema::TYPE_PK,
    'level_id' => Schema::TYPE_INTEGER . " NULL",
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
    'shortcode' => Schema::TYPE_STRING . "(10) NULL",
], $this->tableOptions);

// division
$this->createTable('{{%division}}', [
    'id' => Schema::TYPE_PK,
    'circle_id' => Schema::TYPE_INTEGER . " NULL",
    'name_hi' => Schema::TYPE_STRING . "(200) NULL",
    'name_en' => Schema::TYPE_STRING . "(200) NULL",
], $this->tableOptions);

// feeder
$this->createTable('{{%feeder}}', [
    'id' => Schema::TYPE_PK,
    'shortcode' => Schema::TYPE_STRING . " NULL",
    'name_en' => Schema::TYPE_STRING . " NULL",
    'circle_id' => Schema::TYPE_INTEGER . " NULL",
    'substation_id' => Schema::TYPE_INTEGER . " NULL",
    'substation_name' => Schema::TYPE_STRING . " NULL",
    'pwtrfcty' => Schema::TYPE_STRING . " NULL",
    'pwtrfid' => Schema::TYPE_STRING . " NULL",
    'typeofconductor' => Schema::TYPE_STRING . " NULL",
    'peakdemand' => Schema::TYPE_STRING . " NULL",
    'transformerdesc' => Schema::TYPE_STRING . " NULL",
    'totalcapacity' => Schema::TYPE_STRING . " NULL",
], $this->tableOptions);

// file
$this->createTable('{{%file}}', [
    'id' => Schema::TYPE_PK,
    'model_type' => Schema::TYPE_STRING . "(20) NULL",
    'model_pk' => Schema::TYPE_STRING . "(20) NULL",
    'size' => Schema::TYPE_INTEGER . " NULL",
    'height' => Schema::TYPE_INTEGER . " NULL",
    'width' => Schema::TYPE_INTEGER . " NULL",
    'mime' => Schema::TYPE_STRING . "(50) NULL",
    'url' => Schema::TYPE_TEXT . " NULL",
    'path' => Schema::TYPE_TEXT . " NULL",
    'filename' => Schema::TYPE_TEXT . " NULL",
    'title' => Schema::TYPE_STRING . "(500) NULL",
    'uploaded_by' => Schema::TYPE_INTEGER . " NULL",
    'uploaded_at' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// geography_columns
$this->createTable('{{%geography_columns}}', [
    'f_table_catalog' => Schema::TYPE_STRING . " NULL",
    'f_table_schema' => Schema::TYPE_STRING . " NULL",
    'f_table_name' => Schema::TYPE_STRING . " NULL",
    'f_geography_column' => Schema::TYPE_STRING . " NULL",
    'coord_dimension' => Schema::TYPE_INTEGER . " NULL",
    'srid' => Schema::TYPE_INTEGER . " NULL",
    'type' => Schema::TYPE_TEXT . " NULL",
], $this->tableOptions);

// geometry_columns
$this->createTable('{{%geometry_columns}}', [
    'f_table_catalog' => Schema::TYPE_STRING . "(256) NULL",
    'f_table_schema' => Schema::TYPE_STRING . "(256) NULL",
    'f_table_name' => Schema::TYPE_STRING . "(256) NULL",
    'f_geometry_column' => Schema::TYPE_STRING . "(256) NULL",
    'coord_dimension' => Schema::TYPE_INTEGER . " NULL",
    'srid' => Schema::TYPE_INTEGER . " NULL",
    'type' => Schema::TYPE_STRING . "(30) NULL",
], $this->tableOptions);

// hq
$this->createTable('{{%hq}}', [
    'id' => Schema::TYPE_PK,
    'name_en' => Schema::TYPE_STRING . " NULL",
    'name_hi' => Schema::TYPE_STRING . " NULL",
    'shortcode' => Schema::TYPE_STRING . " NULL",
], $this->tableOptions);

// je_area
$this->createTable('{{%je_area}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
    'division_id' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// level
$this->createTable('{{%level}}', [
    'id' => Schema::TYPE_PK,
    'class_name' => Schema::TYPE_STRING . "(50) NULL",
    'dept_id' => Schema::TYPE_INTEGER . " NULL",
    'name_hi' => Schema::TYPE_STRING . " NULL",
    'name_en' => Schema::TYPE_STRING . " NULL",
], $this->tableOptions);

// material
$this->createTable('{{%material}}', [
    'id' => Schema::TYPE_PK,
    'work_id' => Schema::TYPE_INTEGER . " NULL",
    'type' => Schema::TYPE_INTEGER . " NULL",
    'qty' => Schema::TYPE_DOUBLE . " NULL",
    'unit' => Schema::TYPE_STRING . "(10) NULL",
    'dateofissue' => Schema::TYPE_DATE . " NULL",
], $this->tableOptions);

// material_requirement
$this->createTable('{{%material_requirement}}', [
    'id' => Schema::TYPE_PK,
    'work_id' => Schema::TYPE_INTEGER . " NULL",
    'material_type' => Schema::TYPE_INTEGER . " NULL",
    'qty' => Schema::TYPE_DOUBLE . " NULL",
    'value' => Schema::TYPE_DOUBLE . " NULL",
], $this->tableOptions);

// material_type
$this->createTable('{{%material_type}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(1000) NULL",
    'name_en' => Schema::TYPE_STRING . "(1000) NULL",
    'unitcost_1314' => Schema::TYPE_DOUBLE . " NULL",
    'unitcost_1415' => Schema::TYPE_DOUBLE . " NULL",
    'unitcost_1516' => Schema::TYPE_DOUBLE . " NULL",
    'unit_type' => Schema::TYPE_STRING . "(5) NULL",
], $this->tableOptions);

// photo
$this->createTable('{{%photo}}', [
    'id' => Schema::TYPE_PK,
    'work_id' => Schema::TYPE_INTEGER . " NULL",
    'height' => Schema::TYPE_INTEGER . " NULL",
    'width' => Schema::TYPE_INTEGER . " NULL",
    'mime' => Schema::TYPE_STRING . "(50) NULL",
    'size' => Schema::TYPE_INTEGER . " NULL",
    'url' => Schema::TYPE_TEXT . " NULL",
    'path' => Schema::TYPE_TEXT . " NULL",
    'filename' => Schema::TYPE_TEXT . " NULL",
    'gpslat' => Schema::TYPE_DOUBLE . " NOT NULL",
    'gpslong' => Schema::TYPE_DOUBLE . " NOT NULL",
    'loc' => Schema::TYPE_STRING . " NULL",
    'bwid' => Schema::TYPE_STRING . "(100) NULL",
    'created_by' => Schema::TYPE_INTEGER . " NULL",
    'title' => Schema::TYPE_TEXT . " NULL",
    'created_at' => Schema::TYPE_INTEGER . " NULL",
    'approved' => Schema::TYPE_INTEGER . " NULL DEFAULT '0'",
], $this->tableOptions);

// profile
$this->createTable('{{%profile}}', [
    'id' => Schema::TYPE_PK,
    'user_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'create_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'update_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'full_name' => Schema::TYPE_STRING . "(255) NULL",
], $this->tableOptions);

// profile_field
$this->createTable('{{%profile_field}}', [
    'id' => Schema::TYPE_PK,
    'name' => Schema::TYPE_STRING . "(32) NOT NULL",
    'title' => Schema::TYPE_STRING . "(255) NULL",
    'type_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'position' => Schema::TYPE_INTEGER . " NOT NULL",
    'required' => Schema::TYPE_BOOLEAN . " NOT NULL",
    'configuration' => Schema::TYPE_TEXT . " NULL",
    'error_message' => Schema::TYPE_STRING . "(255) NULL",
    'default_value' => Schema::TYPE_STRING . "(255) NULL",
    'read_only' => Schema::TYPE_BOOLEAN . " NOT NULL",
], $this->tableOptions);

// profile_field_type
$this->createTable('{{%profile_field_type}}', [
    'id' => Schema::TYPE_PK,
    'name' => Schema::TYPE_STRING . "(255) NOT NULL",
    'title' => Schema::TYPE_STRING . "(255) NOT NULL",
], $this->tableOptions);

// profile_field_value
$this->createTable('{{%profile_field_value}}', [
    'id' => Schema::TYPE_PK,
    'user_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'field_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'value' => Schema::TYPE_TEXT . " NULL",
], $this->tableOptions);

// raster_columns
$this->createTable('{{%raster_columns}}', [
    'r_table_catalog' => Schema::TYPE_STRING . " NULL",
    'r_table_schema' => Schema::TYPE_STRING . " NULL",
    'r_table_name' => Schema::TYPE_STRING . " NULL",
    'r_raster_column' => Schema::TYPE_STRING . " NULL",
    'srid' => Schema::TYPE_INTEGER . " NULL",
    'scale_x' => Schema::TYPE_DOUBLE . " NULL",
    'scale_y' => Schema::TYPE_DOUBLE . " NULL",
    'blocksize_x' => Schema::TYPE_INTEGER . " NULL",
    'blocksize_y' => Schema::TYPE_INTEGER . " NULL",
    'same_alignment' => Schema::TYPE_BOOLEAN . " NULL",
    'regular_blocking' => Schema::TYPE_BOOLEAN . " NULL",
    'num_bands' => Schema::TYPE_INTEGER . " NULL",
    'pixel_types' => Schema::TYPE_STRING . " NULL",
    'nodata_values' => Schema::TYPE_STRING . " NULL",
    'out_db' => Schema::TYPE_STRING . " NULL",
    'extent' => Schema::TYPE_STRING . " NULL",
], $this->tableOptions);

// raster_overviews
$this->createTable('{{%raster_overviews}}', [
    'o_table_catalog' => Schema::TYPE_STRING . " NULL",
    'o_table_schema' => Schema::TYPE_STRING . " NULL",
    'o_table_name' => Schema::TYPE_STRING . " NULL",
    'o_raster_column' => Schema::TYPE_STRING . " NULL",
    'r_table_catalog' => Schema::TYPE_STRING . " NULL",
    'r_table_schema' => Schema::TYPE_STRING . " NULL",
    'r_table_name' => Schema::TYPE_STRING . " NULL",
    'r_raster_column' => Schema::TYPE_STRING . " NULL",
    'overview_factor' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// reply
$this->createTable('{{%reply}}', [
    'id' => Schema::TYPE_PK,
    'content_type' => Schema::TYPE_STRING . "(50) NULL",
    'content_type_id' => Schema::TYPE_INTEGER . " NULL",
    'content' => Schema::TYPE_TEXT . " NULL",
    'attachments' => Schema::TYPE_TEXT . " NULL",
    'create_time' => Schema::TYPE_INTEGER . " NULL",
    'author_id' => Schema::TYPE_INTEGER . " NULL",
    'update_time' => Schema::TYPE_INTEGER . " NULL",
    'attentionof' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// role
$this->createTable('{{%role}}', [
    'id' => Schema::TYPE_PK,
    'name' => Schema::TYPE_STRING . "(255) NOT NULL",
    'create_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'update_time' => Schema::TYPE_TIMESTAMP . " NULL",
    'can_admin' => Schema::TYPE_SMALLINT . " NOT NULL DEFAULT '0'",
], $this->tableOptions);

// scheme
$this->createTable('{{%scheme}}', [
    'id' => Schema::TYPE_PK,
    'scheme_code' => Schema::TYPE_STRING . "(20) NULL",
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
    'documents' => Schema::TYPE_TEXT . " NULL",
    'description' => Schema::TYPE_TEXT . " NULL",
    'finyear' => Schema::TYPE_STRING . "(20) NULL",
    'noofworks' => Schema::TYPE_INTEGER . " NULL",
    'totalcost' => Schema::TYPE_DOUBLE . " NULL",
    'images' => Schema::TYPE_TEXT . " NULL",
], $this->tableOptions);

// social_account
$this->createTable('{{%social_account}}', [
    'id' => Schema::TYPE_PK,
    'user_id' => Schema::TYPE_INTEGER . " NULL",
    'provider' => Schema::TYPE_STRING . "(255) NOT NULL",
    'client_id' => Schema::TYPE_STRING . "(255) NOT NULL",
    'data' => Schema::TYPE_TEXT . " NULL",
], $this->tableOptions);

// spatial_ref_sys
$this->createTable('{{%spatial_ref_sys}}', [
    'srid' => Schema::TYPE_INTEGER . " NOT NULL",
    'auth_name' => Schema::TYPE_STRING . "(256) NULL",
    'auth_srid' => Schema::TYPE_INTEGER . " NULL",
    'srtext' => Schema::TYPE_STRING . "(2048) NULL",
    'proj4text' => Schema::TYPE_STRING . "(2048) NULL",
    'PRIMARY KEY (srid)',
], $this->tableOptions);

// substation
$this->createTable('{{%substation}}', [
    'id' => Schema::TYPE_PK,
    'shortcode' => Schema::TYPE_STRING . "(7) NULL",
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
    'type' => Schema::TYPE_INTEGER . " NULL",
    'documents' => Schema::TYPE_TEXT . " NULL",
    'division_id' => Schema::TYPE_INTEGER . " NULL",
    'je_area_id' => Schema::TYPE_INTEGER . " NULL",
    'voltageratio' => Schema::TYPE_STRING . "(30) NULL",
    'mva' => Schema::TYPE_STRING . "(20) NULL",
    'notrf' => Schema::TYPE_STRING . " NULL",
    'capacity' => Schema::TYPE_STRING . " NULL",
    'mvamax' => Schema::TYPE_STRING . " NULL",
    'mvarmax' => Schema::TYPE_STRING . " NULL",
    'remarks' => Schema::TYPE_TEXT . " NULL",
    'circle_id' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// tender
$this->createTable('{{%tender}}', [
    'id' => Schema::TYPE_PK,
    'work_id' => Schema::TYPE_INTEGER . " NULL",
    'dateofpub' => Schema::TYPE_DATE . " NULL",
    'dateofopening' => Schema::TYPE_DATE . " NULL",
    'dateofworkorder' => Schema::TYPE_DATE . " NULL",
    'nameandno' => Schema::TYPE_TEXT . " NULL",
    'attachments' => Schema::TYPE_TEXT . " NULL",
], $this->tableOptions);

// token
$this->createTable('{{%token}}', [
    'user_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'code' => Schema::TYPE_STRING . "(32) NOT NULL",
    'created_at' => Schema::TYPE_INTEGER . " NOT NULL",
    'type' => Schema::TYPE_SMALLINT . " NOT NULL",
], $this->tableOptions);

// user
$this->createTable('{{%user}}', [
    'id' => Schema::TYPE_PK,
    'role_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'status' => Schema::TYPE_SMALLINT . " NOT NULL",
    'email' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'new_email' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'username' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'password' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'auth_key' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'api_key' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'login_ip' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'login_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'create_ip' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
    'create_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'update_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'ban_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'ban_reason' => Schema::TYPE_STRING . "(255) NULL DEFAULT 'NULL'",
], $this->tableOptions);

// user_auth
$this->createTable('{{%user_auth}}', [
    'id' => Schema::TYPE_PK,
    'user_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'provider' => Schema::TYPE_STRING . "(255) NOT NULL",
    'provider_id' => Schema::TYPE_STRING . "(255) NOT NULL",
    'provider_attributes' => Schema::TYPE_TEXT . " NOT NULL",
    'create_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'update_time' => Schema::TYPE_TIMESTAMP . " NULL ",
], $this->tableOptions);

// user_key
$this->createTable('{{%user_key}}', [
    'id' => Schema::TYPE_PK,
    'user_id' => Schema::TYPE_INTEGER . " NOT NULL",
    'type' => Schema::TYPE_SMALLINT . " NOT NULL",
    'key' => Schema::TYPE_STRING . "(255) NOT NULL",
    'create_time' => Schema::TYPE_TIMESTAMP . " NULL",
    'consume_time' => Schema::TYPE_TIMESTAMP . " NULL ",
    'expire_time' => Schema::TYPE_TIMESTAMP . " NULL ",
], $this->tableOptions);

// work
$this->createTable('{{%work}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_TEXT . " NULL",
    'name_en' => Schema::TYPE_TEXT . " NULL",
    'agency' => Schema::TYPE_INTEGER . " NULL",
    'dateofsanction' => Schema::TYPE_DATE . " NULL",
    'dateoffundsreceipt' => Schema::TYPE_DATE . " NULL",
    'dateofstart' => Schema::TYPE_DATE . " NULL",
    'totvalue' => Schema::TYPE_DOUBLE . " NULL",
    'dept_id' => Schema::TYPE_INTEGER . " NULL",
    'work_type_id' => Schema::TYPE_INTEGER . " NULL",
    'address' => Schema::TYPE_STRING . "(250) NULL",
    'gpslat' => Schema::TYPE_DOUBLE . " NULL",
    'gpslong' => Schema::TYPE_DOUBLE . " NULL",
    'loc' => Schema::TYPE_STRING . " NULL",
    'status' => Schema::TYPE_INTEGER . " NULL",
    'scheme_id' => Schema::TYPE_INTEGER . " NULL",
    'work_admin' => Schema::TYPE_INTEGER . " NULL",
    'fromloc' => Schema::TYPE_TEXT . " NULL",
    'toloc' => Schema::TYPE_TEXT . " NULL",
    'substation_id' => Schema::TYPE_INTEGER . " NULL",
    'division_id' => Schema::TYPE_INTEGER . " NULL",
    'package_no' => Schema::TYPE_STRING . "(200) NULL",
    'work_id' => Schema::TYPE_STRING . "(100) NULL",
    'phy' => Schema::TYPE_INTEGER . " NULL DEFAULT '0'",
    'fin' => Schema::TYPE_INTEGER . " NULL DEFAULT '0'",
    'dateofprogress' => Schema::TYPE_DATE . " NULL",
    'remarks' => Schema::TYPE_TEXT . " NULL",
    'feeder_id' => Schema::TYPE_INTEGER . " NULL",
], $this->tableOptions);

// work_progress
$this->createTable('{{%work_progress}}', [
    'id' => Schema::TYPE_PK,
    'work_id' => Schema::TYPE_INTEGER . " NULL",
    'physical' => Schema::TYPE_INTEGER . " NULL",
    'financial' => Schema::TYPE_INTEGER . " NULL",
    'dateofprogress' => Schema::TYPE_DATE . " NULL",
    'remarks' => Schema::TYPE_TEXT . " NULL",
    'expenditure' => Schema::TYPE_DOUBLE . " NULL",
], $this->tableOptions);

// work_type
$this->createTable('{{%work_type}}', [
    'id' => Schema::TYPE_PK,
    'name_hi' => Schema::TYPE_STRING . "(50) NULL",
    'name_en' => Schema::TYPE_STRING . "(50) NULL",
], $this->tableOptions);

// fk: AuthAssignment
$this->addForeignKey('fk_AuthAssignment_item_name', '{{%AuthAssignment}}', 'item_name', '{{%AuthItem}}', 'name');

// fk: AuthItem
$this->addForeignKey('fk_AuthItem_rule_name', '{{%AuthItem}}', 'rule_name', '{{%AuthRule}}', 'name');

// fk: AuthItemChild
$this->addForeignKey('fk_AuthItemChild_parent', '{{%AuthItemChild}}', 'parent', '{{%AuthItem}}', 'name');
$this->addForeignKey('fk_AuthItemChild_child', '{{%AuthItemChild}}', 'child', '{{%AuthItem}}', 'name');

// fk: designation_type
$this->addForeignKey('fk_designation_type_level_id', '{{%designation_type}}', 'level_id', '{{%level}}', 'id');

// fk: division
$this->addForeignKey('fk_division_circle_id', '{{%division}}', 'circle_id', '{{%circle}}', 'id');

// fk: level
$this->addForeignKey('fk_level_dept_id', '{{%level}}', 'dept_id', '{{%department}}', 'id');

// fk: material
$this->addForeignKey('fk_material_type', '{{%material}}', 'type', '{{%material_type}}', 'id');
$this->addForeignKey('fk_material_work_id', '{{%material}}', 'work_id', '{{%work}}', 'id');

// fk: material_requirement
$this->addForeignKey('fk_material_requirement_work_id', '{{%material_requirement}}', 'work_id', '{{%work}}', 'id');

// fk: photo
$this->addForeignKey('fk_photo_work_id', '{{%photo}}', 'work_id', '{{%work}}', 'id');

// fk: profile
$this->addForeignKey('fk_profile_user_id', '{{%profile}}', 'user_id', '{{%user}}', 'id');

// fk: profile_field
$this->addForeignKey('fk_profile_field_type_id', '{{%profile_field}}', 'type_id', '{{%profile_field_type}}', 'id');

// fk: profile_field_value
$this->addForeignKey('fk_profile_field_value_field_id', '{{%profile_field_value}}', 'field_id', '{{%profile_field}}', 'id');

// fk: substation
$this->addForeignKey('fk_substation_circle_id', '{{%substation}}', 'circle_id', '{{%circle}}', 'id');
$this->addForeignKey('fk_substation_division_id', '{{%substation}}', 'division_id', '{{%division}}', 'id');

// fk: tender
$this->addForeignKey('fk_tender_work_id', '{{%tender}}', 'work_id', '{{%work}}', 'id');

// fk: user
$this->addForeignKey('fk_user_role_id', '{{%user}}', 'role_id', '{{%role}}', 'id');

// fk: user_auth
$this->addForeignKey('fk_user_auth_user_id', '{{%user_auth}}', 'user_id', '{{%user}}', 'id');

// fk: user_key
$this->addForeignKey('fk_user_key_user_id', '{{%user_key}}', 'user_id', '{{%user}}', 'id');

// fk: work
$this->addForeignKey('fk_work_agency', '{{%work}}', 'agency', '{{%agency}}', 'id');
$this->addForeignKey('fk_work_dept_id', '{{%work}}', 'dept_id', '{{%department}}', 'id');
$this->addForeignKey('fk_work_work_admin', '{{%work}}', 'work_admin', '{{%designation}}', 'id');
$this->addForeignKey('fk_work_division_id', '{{%work}}', 'division_id', '{{%division}}', 'id');
$this->addForeignKey('fk_work_scheme_id', '{{%work}}', 'scheme_id', '{{%scheme}}', 'id');
$this->addForeignKey('fk_work_substation_id', '{{%work}}', 'substation_id', '{{%substation}}', 'id');
$this->addForeignKey('fk_work_work_type_id', '{{%work}}', 'work_type_id', '{{%work_type}}', 'id');

// fk: work_progress
$this->addForeignKey('fk_work_progress_work_id', '{{%work_progress}}', 'work_id', '{{%work}}', 'id');

    }

    public function safeDown()
    {
    $this->dropTable('{{%AuthAssignment}}'); // fk: item_name
$this->dropTable('{{%AuthItem}}'); // fk: rule_name
$this->dropTable('{{%AuthItemChild}}'); // fk: parent, child
$this->dropTable('{{%AuthRule}}');
$this->dropTable('{{%ae_area}}');
$this->dropTable('{{%agency}}');
$this->dropTable('{{%circle}}');
$this->dropTable('{{%civil}}');
$this->dropTable('{{%department}}');
$this->dropTable('{{%designation}}');
$this->dropTable('{{%designation_type}}'); // fk: level_id
$this->dropTable('{{%division}}'); // fk: circle_id
$this->dropTable('{{%feeder}}');
$this->dropTable('{{%file}}');
$this->dropTable('{{%geography_columns}}');
$this->dropTable('{{%geometry_columns}}');
$this->dropTable('{{%hq}}');
$this->dropTable('{{%je_area}}');
$this->dropTable('{{%level}}'); // fk: dept_id
$this->dropTable('{{%material}}'); // fk: type, work_id
$this->dropTable('{{%material_requirement}}'); // fk: work_id
$this->dropTable('{{%material_type}}');
$this->dropTable('{{%photo}}'); // fk: work_id
$this->dropTable('{{%profile}}'); // fk: user_id
$this->dropTable('{{%profile_field}}'); // fk: type_id
$this->dropTable('{{%profile_field_type}}');
$this->dropTable('{{%profile_field_value}}'); // fk: field_id
$this->dropTable('{{%raster_columns}}');
$this->dropTable('{{%raster_overviews}}');
$this->dropTable('{{%reply}}');
$this->dropTable('{{%role}}');
$this->dropTable('{{%scheme}}');
$this->dropTable('{{%social_account}}');
$this->dropTable('{{%spatial_ref_sys}}');
$this->dropTable('{{%substation}}'); // fk: circle_id, division_id
$this->dropTable('{{%tender}}'); // fk: work_id
$this->dropTable('{{%token}}');
$this->dropTable('{{%user}}'); // fk: role_id
$this->dropTable('{{%user_auth}}'); // fk: user_id
$this->dropTable('{{%user_key}}'); // fk: user_id
$this->dropTable('{{%work}}'); // fk: agency, dept_id, work_admin, division_id, scheme_id, substation_id, work_type_id
$this->dropTable('{{%work_progress}}'); // fk: work_id
$this->dropTable('{{%work_type}}');
$this->dropTable('{{%AuthAssignment}}'); // fk: item_name
$this->dropTable('{{%AuthItem}}'); // fk: rule_name
$this->dropTable('{{%AuthItemChild}}'); // fk: parent, child
$this->dropTable('{{%AuthRule}}');
$this->dropTable('{{%ae_area}}');
$this->dropTable('{{%agency}}');
$this->dropTable('{{%circle}}');
$this->dropTable('{{%civil}}');
$this->dropTable('{{%department}}');
$this->dropTable('{{%designation}}');
$this->dropTable('{{%designation_type}}'); // fk: level_id
$this->dropTable('{{%division}}'); // fk: circle_id
$this->dropTable('{{%feeder}}');
$this->dropTable('{{%file}}');
$this->dropTable('{{%geography_columns}}');
$this->dropTable('{{%geometry_columns}}');
$this->dropTable('{{%hq}}');
$this->dropTable('{{%je_area}}');
$this->dropTable('{{%level}}'); // fk: dept_id
$this->dropTable('{{%material}}'); // fk: type, work_id
$this->dropTable('{{%material_requirement}}'); // fk: work_id
$this->dropTable('{{%material_type}}');
$this->dropTable('{{%photo}}'); // fk: work_id
$this->dropTable('{{%profile}}'); // fk: user_id
$this->dropTable('{{%profile_field}}'); // fk: type_id
$this->dropTable('{{%profile_field_type}}');
$this->dropTable('{{%profile_field_value}}'); // fk: field_id
$this->dropTable('{{%raster_columns}}');
$this->dropTable('{{%raster_overviews}}');
$this->dropTable('{{%reply}}');
$this->dropTable('{{%role}}');
$this->dropTable('{{%scheme}}');
$this->dropTable('{{%social_account}}');
$this->dropTable('{{%spatial_ref_sys}}');
$this->dropTable('{{%substation}}'); // fk: circle_id, division_id
$this->dropTable('{{%tender}}'); // fk: work_id
$this->dropTable('{{%token}}');
$this->dropTable('{{%user}}'); // fk: role_id
$this->dropTable('{{%user_auth}}'); // fk: user_id
$this->dropTable('{{%user_key}}'); // fk: user_id
$this->dropTable('{{%work}}'); // fk: agency, dept_id, work_admin, division_id, scheme_id, substation_id, work_type_id
$this->dropTable('{{%work_progress}}'); // fk: work_id
$this->dropTable('{{%work_type}}');
    }
}
