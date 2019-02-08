using ChartItMD.Views;
using System;
using System.Collections.Specialized;
using System.Net;
using System.Text;
using Xamarin.Forms;


namespace ChartItMD.Models
{
    class DBConnection
    {
        
        public static bool DBInsert(ChartMD.Models.MeasuredValue mv)
        {
            WebClient client = new WebClient();
            Uri uri = new Uri(App.HOSTNAME + "DBInsert.php");// need to make this !!!!!
            NameValueCollection parameters = new NameValueCollection();
            parameters.Add("patientid", "value");
            //parameters.Add("MeasuredValueID", mv.MeasuredValueID.ToString()); this comes from sql AI
            parameters.Add("type", mv.Type);
            parameters.Add("value", mv.Value.ToString());
            parameters.Add("unit", mv.Unit);
            parameters.Add("timestamp", mv.TimeStamp.ToString());
            parameters.Add("measurerid", mv.MeasurerID.ToString());
            

            client.UploadValuesCompleted += Client_UploadValuesCompleted;
            client.UploadValuesAsync(uri, parameters);

            return true;// add some checks to make sure it worked here.
        }

        private static void Client_UploadValuesCompleted(object sender, UploadValuesCompletedEventArgs e)
        {
            string id = Encoding.UTF8.GetString(e.Result);
            // need to do something with this id
        }
        private static void LoginUploadCompleted(object sender, UploadValuesCompletedEventArgs e)
        {
            string id = Encoding.UTF8.GetString(e.Result);
            if (id == "1")
            {
                Application.Current.MainPage = new MainPage();
            }
            if (id == "0")
            {
               App.LASTERROR = "login password pair missmatch please try a new username and password!";
               
            }

        }
        public static bool DBlogin(string username, string password)
        {
            WebClient client = new WebClient();
            Uri uri = new Uri(App.HOSTNAME + "login.php");
            NameValueCollection parameters = new NameValueCollection();
            
            parameters.Add("username", username);
            parameters.Add("password", password);
            //parameters.Add("MeasuredValueID", mv.MeasuredValueID.ToString()); this comes from sql AI


            client.UploadValuesCompleted += LoginUploadCompleted;
            client.UploadValuesAsync(uri, parameters);

            return true;// add some checks to make sure it worked here.
        }







    }
}
