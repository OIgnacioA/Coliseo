public class arbax {

   public static void main (string [] args) {
       
    TrabajoAEcxel pro = new TrabajoAEcxel(); 

    pro.LeerBase(); 
    }

}

class TrabajoAEcxel  {

    public string  PathOrigen = "C:\\Users\\sehent\\Desktop\\REDLINK_A2201.txt";
    public string  PathDestino = "C:\\Users\\sehent\\Desktop\\destino.txt"; 


   public void LeerBase()
    {

        String line;

        
        string LineaNueva = ""; 

        using (StreamReader sr = new StreamReader(PathOrigen))
        { 

            try{
            
                

                while ((line = sr.ReadLine()) != null)
                {
                    if (line != "")
                    {
                        

                        string Objeto = line.Substring(0, 11);
                        //string pObligacion = line.Substring(10, 8);
                        //string Cuota = line.Substring(18, 3);
                        //string saldo = line.Substring(21, 10);
                        //string saldoDecimal = line.Substring(31, 2);
                        
                    



                        LineaNueva = (Objeto );  

                    }

                    EscribirBase(LineaNueva);
                    
                }
                sr.Close();
                //Console.ReadLine();
            }
        catch (Exception e)
        {
            Console.WriteLine("Exception: " + e.Message);
        }
        finally
        {
            Console.WriteLine("Executing finally block.");
        }
        
        }

    }




        public void EscribirBase(string Linea)
    {

        string final = ""; 

        final = Linea;

        //Console.WriteLine(final);

    

        using (StreamWriter sw = new StreamWriter(PathDestino, true)) {

            try
            {
                sw.WriteLine(final);
                //sw.WriteLine();
                
            }
            catch (Exception e)
            {
                Console.WriteLine("Exception: " + e.Message);
            }
           

            }


    }

}