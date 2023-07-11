<h1>Hello {{ $user->name ?? 'Guest' }}</h1>

<p>
  Users:
</p>
<ul>
  @foreach ($users as $item)
      <li>{{ $item->name }}</li>
  @endforeach
</ul>

<p>
  Model Users:
</p>
<ul>
  @foreach ($model_users as $item)
      <li>{{ $item->name }}</li>
  @endforeach
</ul>