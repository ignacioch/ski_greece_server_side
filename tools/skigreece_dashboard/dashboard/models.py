from django.db import models

# Create your models here.

class Skicenter(models.Model):
    name        = models.CharField(max_length=255, unique=True)
    englishName = models.CharField(max_length=255, unique=True)
    snow_down   = models.IntegerField(default=0)
    snow_up     = models.IntegerField(default=0)
    open        = models.IntegerField(default=0)
    temp        = models.DecimalField(max_digits=4, decimal_places=1, blank=True, null=True)
    weatherUrl  = models.CharField(max_length=255, unique=True)
    website     = models.CharField(max_length=255, unique=True)

    def __unicode__(self):
        return self.name    
