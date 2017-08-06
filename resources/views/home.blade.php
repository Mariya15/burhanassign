@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <h2 class="text-center text-primary">Create Project Form </h2>
                        <form action="{{ route('sub-form.php') }}" method="post" class="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <div class="form-group">
                                <label for="project_name">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name" required>
                                @if ($errors->has('project_name'))
                                    <span class="help-block" style="color: #ff0000">
                                        {{ $errors->first('project_name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="project_type">Project Type</label>
                                <select name="project_type" id="project_type" class="form-control" required>
                                    <option value="">Select Project Type</option>
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Other">Other</option>
                                </select>
                                @if ($errors->has('project_type'))
                                    <span class="help-block" style="color: #ff0000">
                                        {{ $errors->first('project_type') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="services">Services</label>
                                <select name="services[]" id="services" class="form-control" required multiple>
                                    <option value="">Select Services</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('services'))
                                    <span class="help-block" style="color: #ff0000">
                                        {{ $errors->first('services') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea class="form-control" name="comments" id="comments"></textarea>
                                @if ($errors->has('comments'))
                                    <span class="help-block" style="color: #ff0000">
                                        {{ $errors->first('comments') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="terms_and_conditions">Terms & Conditions</label><br>
                                <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required> I Agree
                                @if ($errors->has('terms_and_conditions'))
                                    <span class="help-block" style="color: #ff0000">
                                        {{ $errors->first('terms_and_conditions') }}
                                    </span>
                                @endif
                            </div>

                            <input type="submit" name="create_project" value="Create Project" class="btn btn-primary btn-lg">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-center text-success">List of Submitted Forms</h2>
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Form Title</th>
                                <th>Project Type</th>
                                <th>Services</th>
                                <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @forelse(Auth::user()->subForms as $subForm)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $subForm->project_name }}</td>
                                <td>{{ $subForm->project_type }}</td>
                                <td>
                                    @foreach($subForm->services as $service)
                                        {{ $service->service_name }},
                                    @endforeach
                                </td>
                                <td>{{ $subForm->comments }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No records found.</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
