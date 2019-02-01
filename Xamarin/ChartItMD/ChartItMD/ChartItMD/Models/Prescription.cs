using System;
using System.Collections.Generic;
using System.Text;

namespace ChartMD.Models
{
    public class Prescription
    {
        public Int64 PrescriptionID { get; set; }
        public Int64 PrescriberID { get; set; }
        public string DrugName { get; set; }
        public string Reason { get; set; }
        public string Dose { get; set; }
        public string Route { get; set; }
        public string Frequency { get; set; }
        public DateTime StartDateTime { get; set; }
        public DateTime EndDateTime { get; set; }



    }
}
