package com.polije.perpustakaanbeta.model;

import java.util.List;

public class Value  {
    String value;
    String message;
    List<Registrasi> result;

    public String getValue ()
    {
        return value;
    }

    public String getMessage()
    {
        return message;
    }

    public List<Registrasi> getResult()
    {
        return result;
    }
}
