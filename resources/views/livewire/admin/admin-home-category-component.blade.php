<div>
    <div class="contaier" style="padding: 30px 0;">
        <div class="row">
            <div class="con-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Home Categories
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" wire:submit.prevent="updateHomeCategory" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select name="categories[]" wire:model="selected_categories" multiple="multiple" class="sel_categories form-control">
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach --}}
                                        @foreach ($categories as $category)
                                            <option 
                                                @if ($selected_categories != null)
                                                    @if (in_array($category->id, $selected_categories))
                                                        selected
                                                    @endif
                                                @endif
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">No Of Products</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="number_of_products" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e){
                var data = $('.sel_categories').select2('val');
                @this.set('selected_categories', data);
            });
            $("#updateHomeCategory").submit(function(e) {
            $('.sel_categories').select2();
            e.preventDefault();
        });
        });
    </script>
@endpush
