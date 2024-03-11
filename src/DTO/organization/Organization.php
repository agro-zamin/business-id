<?php

namespace AgroZamin\Integration\BusinessId\DTO\organization;

use AgroZamin\Integration\DTO;

/**
 * @property Account[] $accounts
 */
class Organization extends DTO {
    public string $id;
    public int $business_id;
    public int $tin;
    public string $name;
    public string $address;
    public Logo|null $logo;
    public User $creator;
    public Employee|null $director;
    public Employee|null $accountant;
    public Employee|null $employee;
    public Account|null $account;
    public array $accounts = [];
    public Contacts $contacts;
    public string $create_time;
    public string $last_update_time;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'logo' => [Logo::class, 'logo'],
            'creator' => [User::class, 'creator'],
            'director' => [Employee::class, 'director'],
            'accountant' => [Employee::class, 'accountant'],
            'employee' => [Employee::class, 'employee'],
            'account' => [Account::class, 'account'],
            'contacts' => [Contacts::class, 'contacts'],
        ];
    }
}