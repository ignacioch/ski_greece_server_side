from django.db import models

# Create your models here.

class Skicenter(models.Model):
    name        = models.CharField(max_length=255, unique=True)
    englishName = models.CharField(max_length=255, unique=True)
    snow_down   = models.IntegerField(default=0)
    snow_up     = models.IntegerField(default=0)
    openCond    = models.IntegerField(default=0)
    weatherUrl  = models.CharField(max_length=255, unique=True)
    website     = models.CharField(max_length=255, unique=True)

    def __unicode__(self):
        return self.name    
