@extends('layouts.admin.master')

@section('title')
    @parent
    Days
@endsection

@section('pageHeading')
    Day 
@endsection

@section('pageSubHeading')
    List
@endsection

@section('content')
         <form action="/days/add" method="post">
             {{ csrf_field() }}
            <div class="form-group">            
                <label for="days">Select Match Days (hold shift to select more than one):</label>
                <select required="required" multiple class="form-control" name="days[]" id="days" size="32" style="font-size: 12px; width: 250px;">
                    @foreach($days as $key => $day)
                        @php
                            $selected = '';
                            if (! empty($day)) {
                                if (in_array($day, $selectedDays)) {
                                    $selected = 'selected = "selected"';
                                }
                            }
                        @endphp

                        <option {{$selected}} value="{{$day}}">{{DateTime::createFromFormat('Y-m-d', $day)->format('jS F , l ')}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">     
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-info" href="/match-days"> Match Days</a>
            </div>              
        </form>
@endsection        