<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Seniority Designation')
@section('content')
<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1>Academic Seniority Designation</h1>
            <div class="row">
                <div class="col-md-12 text-left">
                    <table class="table table-dark">
                        <th>Designation</th>
                        <th>Seniority</th>
                        <th>Action</th>
                        @foreach($seniority as $senioritys)
                        <tr>
                            {{csrf_field()}}
                            <form action="{{url('/seniorityDesignationsave/'.$senioritys->id)}}">
                                <td> {{$senioritys->designation}} </td>
                                <td>
                                    <div class="form-group form-row">
                                        <div class="col-sm-9">
                                            <select id="seniority" name="seniority" class="form-control">
                                                @for ($sen = $senioritys->seniority == 0 ? 0 : $senioritys->seniority; $sen <= $count; $sen++) <option value="{{$sen}}">{{$sen}}</option>
                                                
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning">SUBMIT</button>
                                    <a href="{{url('/seniorityDesignationDelete/'.$senioritys->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection