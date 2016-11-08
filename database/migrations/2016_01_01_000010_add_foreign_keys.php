<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Clients
         */
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('main_contact_id')->references('id')->on('contacts');
            $table->foreign('main_address_id')->references('id')->on('addresses');
            $table->foreign('language_id')->references('id')->on('languages');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('address_id')->references('id')->on('addresses');
        });

        /*
         * Custom Fields
         */
        Schema::table('custom_field_values', function (Blueprint $table) {
            $table->foreign('custom_field_id')->references('id')->on('custom_fields');
            $table->foreign('author_id')->references('id')->on('users');
        });

        /*
         * Items
         */
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('item_groups');
        });

        Schema::table('item_groups', function (Blueprint $table) {
            $table->foreign('parent_group_id')->references('id')->on('item_groups');
        });

        /*
         * Payments
         */
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            $table->foreign('payment_gateway_id')->references('id')->on('payment_gateways');
        });

        /*
         * Projects
         */
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('leader_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::table('time_trackings', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('assignee_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('task_statuses');
        });

        /*
         * Settings
         */
        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('addresses');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });

        /*
         * Users
         */
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('client_contact_id')->references('id')->on('clients');
            $table->foreign('company_id')->references('id')->on('companies');
        });

        /*
         * Vouchers
         */
        Schema::table('credit_invoices', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('invoice_quotes', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('quote_id')->references('id')->on('quotes');
        });

        Schema::table('recurring_invoices', function (Blueprint $table) {
            $table->foreign('base_invoice_id')->references('id')->on('invoices');
            $table->foreign('base_voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('voucher_group_id')->references('id')->on('voucher_groups');
            $table->foreign('status_id')->references('id')->on('voucher_statuses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('project_id')->references('id')->on('projects');
        });

        Schema::table('voucher_discounts', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('voucher_amounts', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('voucher_items', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });

        Schema::table('item_amounts', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('voucher_items');
        });

        Schema::table('voucher_item_discounts', function (Blueprint $table) {
            $table->foreign('voucher_item_id')->references('id')->on('voucher_items');
        });

        /*
         * Other
         */
        Schema::table('attachments', function (Blueprint $table) {
            $table->foreign('uploader_id')->references('id')->on('users');
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        /*
         * Tax rate many-to-many
         */
        Schema::table('tax_rate_voucher_item', function (Blueprint $table) {
            $table->foreign('voucher_item_id')->references('id')->on('voucher_items');
            $table->foreign('tax_rate_id')->references('id')->on('tax_rates');
        });

        Schema::table('tax_rate_voucher', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('tax_rate_id')->references('id')->on('tax_rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Clients
         */
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_client_id_foreign');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('clients_main_contact_id_foreign');
            $table->dropForeign('clients_main_address_id_foreign');
            $table->dropForeign('clients_language_id_foreign');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('contacts_client_id_foreign');
            $table->dropForeign('contacts_address_id_foreign');
        });

        /*
         * Custom Fields
         */
        Schema::table('custom_field_values', function (Blueprint $table) {
            $table->dropForeign('custom_field_values_custom_field_id_foreign');
            $table->dropForeign('custom_field_values_author_id_foreign');
        });

        /*
         * Items
         */
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_group_id_foreign');
        });

        Schema::table('item_groups', function (Blueprint $table) {
            $table->dropForeign('item_groups_parent_group_id_foreign');
        });

        /*
         * Payments
         */
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_voucher_id_foreign');
            $table->dropForeign('payments_payment_method_id_foreign');
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropForeign('payment_methods_payment_gateway_id_foreign');
        });

        /*
         * Projects
         */
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_leader_id_foreign');
            $table->dropForeign('projects_client_id_foreign');
        });

        Schema::table('time_trackings', function (Blueprint $table) {
            $table->dropForeign('time_trackings_task_id_foreign');
            $table->dropForeign('time_trackings_user_id_foreign');
            $table->dropForeign('time_trackings_voucher_id_foreign');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropForeign('tasks_author_id_foreign');
            $table->dropForeign('tasks_assignee_id_foreign');
            $table->dropForeign('tasks_status_id_foreign');
        });

        /*
         * Settings
         */
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_address_id_foreign');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeign('settings_company_id_foreign');
            $table->dropForeign('settings_user_id_foreign');
        });

        /*
         * Users
         */
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_client_contact_id_foreign');
            $table->dropForeign('users_company_id_foreign');
        });

        /*
         * Vouchers
         */
        Schema::table('credit_invoices', function (Blueprint $table) {
            $table->dropForeign('credit_invoices_voucher_id_foreign');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_voucher_id_foreign');
        });

        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->dropForeign('purchase_invoices_voucher_id_foreign');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->dropForeign('quotes_voucher_id_foreign');
        });

        Schema::table('invoice_quotes', function (Blueprint $table) {
            $table->dropForeign('invoices_quotes_invoice_id_foreign');
            $table->dropForeign('invoices_quotes_quote_id_foreign');
        });

        Schema::table('recurring_invoices', function (Blueprint $table) {
            $table->dropForeign('recurring_invoices_base_invoice_id_foreign');
            $table->dropForeign('recurring_invoices_base_voucher_id_foreign');
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropForeign('vouchers_company_id_foreign');
            $table->dropForeign('vouchers_voucher_group_id_foreign');
            $table->dropForeign('vouchers_status_id_foreign');
            $table->dropForeign('vouchers_user_id_foreign');
            $table->dropForeign('vouchers_client_id_foreign');
            $table->dropForeign('vouchers_currency_id_foreign');
            $table->dropForeign('vouchers_language_id_foreign');
            $table->dropForeign('vouchers_project_id_foreign');
        });

        Schema::table('voucher_discounts', function (Blueprint $table) {
            $table->dropForeign('voucher_discounts_voucher_id_foreign');
        });

        Schema::table('voucher_amounts', function (Blueprint $table) {
            $table->dropForeign('voucher_amounts_voucher_id_foreign');
        });

        Schema::table('voucher_items', function (Blueprint $table) {
            $table->dropForeign('voucher_items_voucher_id_foreign');
        });

        Schema::table('item_amounts', function (Blueprint $table) {
            $table->dropForeign('item_amounts_item_id_foreign');
        });

        Schema::table('voucher_item_discounts', function (Blueprint $table) {
            $table->dropForeign('voucher_item_discounts_voucher_item_id_foreign');
        });

        /*
         * Other
         */
        Schema::table('attachments', function (Blueprint $table) {
            $table->dropForeign('attachments_uploader_id_foreign');
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign('notes_author_id_foreign');
        });

        /*
         * Tax rate many-to-many
         */
        Schema::table('tax_rate_voucher_item', function (Blueprint $table) {
            $table->dropForeign('tax_rate_voucher_item_voucher_item_id_foreign');
            $table->dropForeign('tax_rate_voucher_item_tax_rate_id_foreign');
        });

        Schema::table('tax_rate_voucher', function (Blueprint $table) {
            $table->dropForeign('tax_rate_voucher_voucher_id_foreign');
            $table->dropForeign('tax_rate_voucher_tax_rate_id_foreign');
        });
    }
}
