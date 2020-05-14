<?php

namespace App\Policies;

use App\AccountType;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function viewAny(Employee $employee)
    {
		$permissions = $employee->accountType()->permissions;
		return in_array('READ', $permissions['accounts']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\AccountType  $accountType
     * @return mixed
     */
    public function view(Employee $employee)
    {
		$permissions = $employee->accountType()->permissions;
		return in_array('READ', $permissions['accounts']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
		$permissions = $employee->accountType()->permissions;
		return in_array('WRITE', $permissions['accounts']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\AccountType  $accountType
     * @return mixed
     */
    public function update(Employee $employee, AccountType $accountType)
    {
		$permissions = $employee->accountType()->permissions;
		return $accountType->id === $employee->account_type_id && in_array('WRITE', $permissions['accounts']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\AccountType  $accountType
     * @return mixed
     */
    public function delete(Employee $employee, AccountType $accountType)
    {
		$permissions = $employee->accountType()->permissions;
		return $accountType->id === $employee->account_type_id && in_array('WRITE', $permissions['accounts']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\AccountType  $accountType
     * @return mixed
     */
    public function restore(Employee $employee, AccountType $accountType)
    {
		$permissions = $employee->accountType()->permissions;
		return $accountType->id === $employee->account_type_id && in_array('WRITE', $permissions['accounts']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\AccountType  $accountType
     * @return mixed
     */
    public function forceDelete(Employee $employee, AccountType $accountType)
    {
		$permissions = $employee->accountType()->permissions;
		return $accountType->id === $employee->account_type_id && in_array('WRITE', $permissions['accounts']);
    }
}
