@extends('layouts.template')

@foreach($student as $siswa)
    <p>Nama Siswa: {{ $siswa->name }}</p>
    <p>Rayon Siswa: {{$siswa->rayon_id}}</p>
@endforeach