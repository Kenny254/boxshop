<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			<i class="fa fa-sign-in"></i>
			<span class="@if(Auth::check()){{ 'user-photo' }}@endif"
				  style="@if(Auth::check()) {{ "background-image:url('".(\Auth::user()->pic_url?\Auth::user()->pic_url:'img/no-avatar.png')."');" }} @endif">{{ trans('user.login') }}</span>
			<!-- {{ trans('user.your_account') }} -->
			 <span class="caret"></span>
		</a>
	<div class="dropdown-menu col-xs-12" role="menu" >
		<?php $menu=\Menu::top(true);?>
		@foreach ($menu as $item)
		    <div class="btn btn-link {{isset($item['class'])?$item['class']:''}} {{ Utility::active($item['route']) }}" >
				<a href='{{$item['route']}}'>
					@if (isset($item['icon']))
						<span class="{{$item['icon']}}"></span>
					@endif
					{{$item['text']}}
					@if (isset($item['cont'])&&$item['cont']>0)
					 <span class="badge">{{$item['cont']}}</span>
					@endif
				</a>
			</div>
		@endforeach
		@if (auth()->check())
			<div>
				<form action="/logout" method="POST">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-success btn-block">
						<i class="glyphicon glyphicon-log-out"></i>&nbsp;{{ trans('user.logout') }}
					</button>
				</form>
			</div>
		@endif
	</div>
</li>