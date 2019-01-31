using System;
using System.Collections.Generic;
using System.Text;

namespace ChartMD.Models
{
    public class ContactInfo
    {
        public Int64 ContactInfoId { get; set; }
        public string Address1 { get; set; }
        public string Address2 { get; set; }
        public string City { get; set; }
        public string State { get; set; }
        public string Zip { get; set; }

        public string Phone1 { get; set; }
        public string Phone2 { get; set; }
        public string Email { get; set; }
    }
}
