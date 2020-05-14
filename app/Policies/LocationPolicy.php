<?php

namespace App\Policies;

use App\Location;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Employee can view any models.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function viewAny(Employee $employee)
    {
		$permissions = $employee->accountType()->permissions;
		return in_array('READ', $permissions['locations']);
    }

    /**
     * Determine whether the Employee can view the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Location  $location
     * @return mixed
     */
    public function view(Employee $employee, Location $location)
    {
		$permissions = $employee->accountType()->permissions;
		return $employee->zoo_id === $location->zoo_id && in_array('READ', $permissions['locations']);
    }

    /**
     * Determine whether the Employee can create models.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
		$permissions = $employee->accountType()->permissions;
		return in_array('WRITE', $permissions['locations']);
    }

    /**
     * Determine whether the Employee can update the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Location  $location
     * @return mixed
     */
    public function update(Employee $employee, Location $location)
    {
		$permissions = $employee->accountType()->permissions;
		return $employee->zoo_id === $location->zoo_id && in_array('WRITE', $permissions['locations']);
    }

    /**
     * Determine whether the Employee can delete the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Location  $location
     * @return mixed
     */
    public function delete(Employee $employee, Location $location)
    {
		$permissions = $employee->accountType()->permissions;
		return $employee->zoo_id === $location->zoo_id && in_array('WRITE', $permissions['locations']);
    }

    /**
     * Determine whether the Employee can restore the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Location  $location
     * @return mixed
     */
    public function restore(Employee $employee, Location $location)
    {
		$permissions = $employee->accountType()->permissions;
		return $employee->zoo_id === $location->zoo_id && in_array('WRITE', $permissions['locations']);
    }

    /**
     * Determine whether the Employee can permanently delete the model.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Location  $location
     * @return mixed
     */
    public function forceDelete(Employee $employee, Location $location)
    {
		$permissions = $employee->accountType()->permissions;
		return $employee->zoo_id === $location->zoo_id && in_array('WRITE', $permissions['locations']);
    }
}
