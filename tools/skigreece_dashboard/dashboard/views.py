from django.shortcuts import render

# Create your views here.

from django.http import HttpResponse

def index(request) :
   return HttpResponse("Welcome to dashboard main page. Go to <a href = '/dashboard/about'> About page </a>") 

def about(request) :
   return HttpResponse("This is the about page. Return to <a href='/dashboard'> Main </a>") 
