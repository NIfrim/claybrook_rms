<?php

namespace App\Policies;

use App\Bird;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class BirdPolicy
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
		return in_array('READ', $permissions['animals']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Bird  $bird
     * @return mixed
     */
    public function view(Employee $employee, Bird $bird)
    {
		$permissions = $employee->accountType()->permissions;
		$animal = $bird->animal;
		$location = $animal->location;
		return $location->zoo_id === $employee->zoo_id && in_array('READ', $permissions['animals']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Bird  $bird
     * @return mixed
     */
    public function update(Employee $employee, Bird $bird)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Bird  $bird
     * @return mixed
     */
    public function delete(Employee $employee, Bird $bird)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Bird  $bird
     * @return mixed
     */
    public function restore(Employee $employee, Bird $bird)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Bird  $bird
     * @return mixed
     */
    public function forceDelete(Employee $employee, Bird $bird)
    {
        //
    }
}
